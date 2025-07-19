<?php

require __DIR__ . '/inc/all.inc.php';

var_dump(mb_chr(127482) . mb_chr(127480));
var_dump(mb_chr(127462));
var_dump(mb_chr(ord('a')));
var_dump(ord('u'));

$WorldCityRepository = new WorldCityRepository($pdo);
$entries = $WorldCityRepository->fetch();

render('index.view', [
    'entries' => $entries
]);