<h1>List of cities</h1>

<ul>
    <?php foreach($entries as $city): ?>
        <li>
            <?= $city->city ?> (<?= $city->country ?>)
        </li>
    <?php endforeach ?>
</ul>