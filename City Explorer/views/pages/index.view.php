<h1>List of cities</h1>

<ul>
    <?php foreach($entries as $city): ?>
        <a href="city.php?<?php echo http_build_query(['id' => $city->id]) ?>">
            <li>
                <?= $city->city ?> (<?= $city->country ?>)
            </li>
        </a>
    <?php endforeach ?>
</ul>