<?php

require __DIR__ . '/inc/all.inc.php';

$WorldCityRepository = new WorldCityRepository($pdo);
$entries = $WorldCityRepository->fetch();

$count = $WorldCityRepository->getDataCount();
$perPage = 50;
$page = (int) ($_GET['page'] ?? 1);
$page = max(1, $page);


render('index.view', [
    'entries' => $entries,
    'pagination' => $WorldCityRepository->paginate($page, $perPage),
    'page' => $page
]);