<?php
declare(strict_types=1);

class WorldCityRepository {

    public function __construct(private PDO $pdo) {}

    public function fetch(): array {
        $stmt = $this->pdo->prepare('SELECT
                id, city, lat, lng, country, iso2, iso3, capital, population 
                FROM worldcities ORDER BY population DESC LIMIT 10');
        $stmt->execute();

        $entries = $stmt->fetchAll(PDO::FETCH_CLASS, 'WorldCityModel');


        return $entries;
    }

}