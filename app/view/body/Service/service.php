<?php

use staditek\TugasAkhir\App\core\router;

?>
<section id="maincontent">
    <header>
        <div class="content left">
            <div class="header">
                <img src="<?= router::url('/assets/img/service-dog.png') ?>" alt="">
                <h3><b>HI,</b> Welcome To AniPets Service</h3>
                <span>Premium Pet Food, Best Service & Premium Item</span>
                <span>Anabul is safe, employers are happy</span>
            </div>
            <div class="but">
                <a href="#main">Show More</a>
            </div>
        </div>
        <div class="content right">
            <div class="image">
                <img src="<?= router::url('/assets/img/img-service.png') ?>" alt="">
            </div>
        </div>
    </header>
    <main>
        <div class="row first">
            <?php
            foreach ($data['showData'] as $service) {
            ?>
                <div class="card">
                    <div class="headicon">
                        <img src="<?= router::url("/assets/img/$service->service_picture") ?>" alt="">
                        <h3><?= $service->service_name ?></h3>
                    </div>
                    <div class="text">
                        <h4><?= $service->service_detail ?></h4>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="row second">
            <div class="left">
                <img src="<?= router::url('/assets/img/service-card.jpg') ?>" alt="">
            </div>
            <div class="right">
                <div class="form">
                    <div class="head">
                        <span>Planning To Reserve Service</span>
                        <h3>Get a Service For Your Pet</h3>
                    </div>
                    <form action="<?= router::url('/addServices')?>" method="post">
                        <div class="form-inp">
                            <label>Your Pet</label>
                            <select name="pet_categories">
                                <option>Select...</option>
                                <optgroup>
                                    <?php
                                    foreach ($data['showPetCategories'] as $petCategory) {
                                    ?>
                                        <option value="<?= $petCategory->pet_category_id ?>"><?= $petCategory->pet_category_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-inp">
                            <label>Service</label>
                            <select name="service_name">
                                <option>Select...</option>
                                <optgroup>
                                    <?php
                                    foreach ($data['showData'] as $service_name) {
                                    ?>
                                        <option value="<?= $service_name->service_id ?>"><?= $service_name->service_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-inp">
                            <label>Date Reserved</label>
                            <input type="date" name="date_reserved">
                        </div>
                        <div class="form-butt">
                            <input type="submit" value="Reserve"> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</section>