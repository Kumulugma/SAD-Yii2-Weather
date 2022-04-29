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
            <th scope="col">Gatunek</th>
            <th scope="col">Lokalizacje</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach($species as $item) {?>
        <tr>
            <th scope="row"><?=$i?></th>
            <td><?=$item->name?></td>
            <td>
                <ul>
                    <?php foreach($item->locationsSpecies as $speciesLocation) { ?>
                    <li><?= $speciesLocation->locations->name ?> </li>
                    <?php } ?>
                </ul>
            </td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>