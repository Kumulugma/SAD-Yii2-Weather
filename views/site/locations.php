<?php
use app\assets\DatatableAsset;
use app\assets\DatatableConfigAsset;
DatatableAsset::register($this);
DatatableConfigAsset::register($this);
?>
<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Lokalizacja</th>
            <th scope="col">Gatunki</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach($locations as $location) {?>
        <tr>
            <th scope="row"><?=$i?></th>
            <td><?=$location->name?></td>
            <td>
                <ul>
                    <?php foreach($location->speciesLocations as $speciesLocation) { ?>
                    <li><?= $speciesLocation->species->name ?> </li>
                    <?php } ?>
                </ul>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>