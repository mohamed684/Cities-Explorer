<h1>
    City: <?= $city->city ?> (<?= $city->getFlag() ?> <?= $city->country ?>)
</h1>

<table>
    <tbody>
        <tr>
            <th>
                City Name:
            </th>
            <td>
                <?= $city->city ?>
            </td>
        </tr>
        <tr>
            <th>
                City Name (ascii):
            </th>
            <td>
                <?= $city->cityAscii ?>
            </td>
        </tr>
        <tr>
            <th>
                Country Flag:
            </th>
            <td>
                <?= $city->getFlag() ?>
            </td>
        </tr>
        <tr>
            <th>
                Country:
            </th>
            <td>
                <?= $city->country ?>
            </td>
        </tr>
        <tr>
            <th>
                ISO2 Code of Country:
            </th>
            <td>
                <?= $city->iso2 ?>
            </td>
        </tr>
        <tr>
            <th>
                ISO2 Code of Country:
            </th>
            <td>
                <?= $city->iso3 ?>
            </td>
        </tr>
        <tr>
            <th>
                Population:
            </th>
            <td>
                <?= $city->population ?>
            </td>
        </tr>
    </tbody>
</table>