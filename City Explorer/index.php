<?php

require __DIR__ . '/inc/all.inc.php';

$WorldCityRepository = new WorldCityRepository($pdo);
$entries = $WorldCityRepository->fetch();

render('index.view', [
    'entries' => $entries
]);