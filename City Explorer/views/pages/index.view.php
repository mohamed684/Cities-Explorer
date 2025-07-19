<?php

if(!empty($pagination['entries'])) {
    $entries = $pagination['entries'];
}
?>
<h1>List of cities</h1>

<ul>
    <?php foreach($entries as $city): ?>
        <a href="city.php?<?php echo http_build_query(['id' => $city->id]) ?>">
            <li>
                <?= $city->city ?> (<?= $city->getFlag() ?> <?= $city->country ?>)
            </li>
        </a>
    <?php endforeach ?>
</ul>

<nav>
    <?php if($page > 1): ?>
        <a href="index.php?<?php echo http_build_query(['page' => $page - 1]) ?>">
            previous 
        </a>
    <?php endif ?>
    <?php if($page < $pagination['pages']): ?>
        <a href="index.php?<?php echo http_build_query(['page' => $page + 1]) ?>">
            Next 
        </a>
    <?php endif ?>
</nav>