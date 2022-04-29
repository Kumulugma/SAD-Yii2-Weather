<?php

use app\assets\DatatableAsset;
use app\assets\DatatableConfigAsset;
use app\assets\ChartAsset;
use app\assets\ChartJsConfigAsset;

DatatableAsset::register($this);
DatatableConfigAsset::register($this);
ChartAsset::register($this);
ChartJsConfigAsset::register($this);
?>
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php foreach ($locations as $k => $item) { ?>
                <a class="nav-link <?= $k == 0 ? 'active' : '' ?>" id="v-pills-<?= strtolower($item->name) ?>-tab" data-toggle="pill" href="#v-pills-<?= strtolower($item->name) ?>" role="tab" aria-controls="v-pills-home" aria-selected="<?= $k == 0 ? 'true' : 'false' ?>"><?= $item->name ?></a>
            <?php } ?>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <?php foreach ($locations as $k => $item) { ?>
                <div class="tab-pane fade <?= $k == 0 ? 'show active' : '' ?>" id="v-pills-<?= strtolower($item->name) ?>" role="tabpanel" aria-labelledby="v-pills-<?= strtolower($item->name) ?>-tab">
                    <table class="table datatable-measurements" >
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Data</th>
                                <th scope="col">Wilgotność</th>
                                <th scope="col">Temp. minimalna</th>
                                <th scope="col">Temp. maksymalna</th>
                                <th scope="col">Temp. właściwa</th>
                                <th scope="col">Ciśnienie</th>
                                <th scope="col">Widoczność</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $datasets = [];
                            $labels = [];
                            foreach ($item->measurements as $measurement) {
                                $datasets['humidity']['data'][] = '"' . $measurement->humidity . '"';
                                $datasets['humidity']['labels'][] = '"' . $measurement->measure_time->format('Y-m-d H:i') . '"';
                                $datasets['humidity']['label'] = 'Wilgotność powietrza w ' . $item->name;

                                $datasets['pressure']['data'][] = '"' . $measurement->pressure . '"';
                                $datasets['pressure']['labels'][] = '"' . $measurement->measure_time->format('Y-m-d H:i') . '"';
                                $datasets['pressure']['label'] = 'Ciśnienie w ' . $item->name;

                                $datasets['temp_min']['data'][] = '"' . $measurement->temp_min . '"';
                                $datasets['temp_min']['labels'][] = '"' . $measurement->measure_time->format('Y-m-d H:i') . '"';
                                $datasets['temp_min']['label'] = 'Temperatura minimalna w ' . $item->name;

                                $datasets['temp_max']['data'][] = '"' . $measurement->temp_max . '"';
                                $datasets['temp_max']['labels'][] = '"' . $measurement->measure_time->format('Y-m-d H:i') . '"';
                                $datasets['temp_max']['label'] = 'Temperatura maksymalna w ' . $item->name;
                                ?>
                                <tr>
                                    <th scope="row"><small><?= $i ?></small></th>
                                    <td><small><?= $measurement->measure_time->format('Y-m-d H:i') ?></small></td>
                                    <td><small><?= $measurement->humidity ?>%</small></td>
                                    <td><small><?= $measurement->temp_feels ?>&#x2103;</small></td>
                                    <td><small><?= $measurement->temp_min ?>&#x2103;</small></td>
                                    <td><small><?= $measurement->temp_max ?>&#x2103;</small></td>
                                    <td><small><?= $measurement->pressure ?></small></td>
                                    <td><small><?= $measurement->visibility ?></small></td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>


                    <?php foreach ($datasets as $dataset) { ?>

                        <canvas class="chart" width="400" height="400" data-data='[<?= implode(',', $dataset['data']) ?>]' data-labels='[<?= implode(',', $dataset['labels']) ?>]' data-label="<?= $dataset['label'] ?>"></canvas>
                        <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

