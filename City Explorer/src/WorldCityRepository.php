<?php
declare(strict_types=1);

class WorldCityRepository {

    public function __construct(private PDO $pdo) {}

    private function arrayToObj(array $entry): WorldCityModel {
        return new WorldCityModel(
                    $entry['id'],
                    $entry['city'],
                    $entry['city_ascii'],
                    (float) $entry['lat'],
                    (float) $entry['lng'],
                    $entry['country'],
                    $entry['iso2'],
                    $entry['iso3'],
                    $entry['admin_name'],
                    $entry['capital'],
                    $entry['population']
                );
    }

    public function fetch(): array {
        $stmt = $this->pdo->prepare('SELECT * FROM worldcities ORDER BY population DESC LIMIT 10');
        $stmt->execute();

        $models = [];
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($entries as $entry) {
            $models[] = $this->arrayToObj($entry);
        }

        return $models;
    }

    public function fetchById(int $id): ?WorldCityModel {
        $stmt = $this->pdo->prepare('SELECT * FROM worldcities WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if(empty($entry)) {
            return null;
        }

        return $this->arrayToObj($entry);
    }

    public function update(int $id, array $properites): WorldCityModel {
        $city = (string) $properites['city'];
        $cityAscii = (string) $properites['city_ascii'];
        $country = (string) $properites['country'];
        $iso2 = (string) $properites['iso2'];
        $iso3 = (string) $properites['iso3'];
        $population = (int) $properites['population'];

        $stmt = $this->pdo->prepare('UPDATE worldcities SET 
                city = :city, city_ascii = :cityAscii, country = :country, iso2 = :iso2, iso3 = :iso3, population = :population
                WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':cityAscii', $cityAscii);
        $stmt->bindValue(':country', $country);
        $stmt->bindValue(':iso2', $iso2);
        $stmt->bindValue(':iso3', $iso3);
        $stmt->bindValue(':population', $population);

        $stmt->execute();

        return $this->fetchById($id);
    }

    public function getDataCount(): int {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) AS count FROM worldcities');
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }

    public function paginate(int $page = 1, int $perPage = 20): array {
        $offset = ($page - 1) * $perPage;
        $count = $this->getDataCount();

        $stmt = $this->pdo->prepare('SELECT * FROM worldcities ORDER BY population DESC LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->execute();

        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $models = [];

        foreach($entries as $entry) {
            $models[] = $this->arrayToObj($entry);
        }

        $pagination = [
            'pages' => ceil($count / $perPage),
            'entries' => $models
        ];

        return $pagination;
    }

}