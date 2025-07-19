<?php
require __DIR__ . '/inc/all.inc.php';

$id = (int) ($_GET['id'] ?? 0);

$WorldCityRepository = new WorldCityRepository($pdo);
$city = $WorldCityRepository->fetchById($id);

if(empty($city)) {
    header('Location: index.php');
    die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST)) {
        $city = $WorldCityRepository->update($id, [
                    'city' => $_POST['city'],
                    'city_ascii' => $_POST['city_ascii'],
                    'country' => $_POST['country'],
                    'iso2' => $_POST['iso2'],
                    'iso3' => $_POST['iso3'],
                    'population' => $_POST['population']
                ]);

        render('edit.view', [
            'city' => $city
        ]);
    }
}

render('edit.view', [
    'city' => $city
]);