<?php
require __DIR__ . '/inc/all.inc.php';

$id = (int) ($_GET['id'] ?? 0);

$WorldCityRepository = new WorldCityRepository($pdo);
$city = $WorldCityRepository->fetchById($id);

if(empty($city)) {
    header('Location: index.php');
    die();
}

render('edit.view', [
    'city' => $city
]);