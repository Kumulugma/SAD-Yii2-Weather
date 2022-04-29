<?php

/** @var yii\web\View $this */

$this->title = 'Baza warunków atmosferycznych';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Gatunki</h2>

                <p>Informacje zebrane w systemie dotyczą szeregu gatunków z grupy rosiczek pigmejskich. Ze względu na sporą ilość takich roślin, ograniczyłem się do <?=$species::find()->count()?> gatunków.</p>

            </div>
            <div class="col-lg-4">
                <h2>Lokacje</h2>

                <p>Pomimo ograniczenia jakim jest występowanie tego typu roślin wyłącznie do terytorium Australii, w naturalnym środowisku możemy spotkać je w kilku różnych lokalizacjach. Część z nich charakterystyczna jest wyłącznie dla pojedynczych gatunków, w innych zaś natkniemy się na ich większą różnorodność. Z tego też względu w bazie danych wyszczególniłem <?=$locations::find()->count()?> lokalizacji charakterystycznych dla badanych gatunków.</p>

            </div>
            <div class="col-lg-4">
                <h2>Pomiary</h2>

                <p>Ze względu na różnorodność danych możliwych do zebrania w wybranych lokalizacjach, ograniczyłem się do naistotniejszych. Pomiary zebrane są w szeregi czasowe z krokiem 1h. Jak do tej pory zebrane zostało <?=$measurements::find()->count()?> wpisów.</p>

            </div>
        </div>

    </div>
</div>
