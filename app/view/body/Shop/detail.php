<?php

use staditek\TugasAkhir\App\core\router;

?>
<section id="maincontent">
    <header style="background-image: url(<?= router::url('/assets/img/bg-shop2.jpg') ?>);">
        <div class="content">
            <div class="header">
                <img src="<?= router::url('/assets/img/pet-3.png') ?>" alt="">
                <h3><b>HI,</b> Welcome To AniPets Shop</h3>
                <span>Premium Pet Food, Best Service & Premium Item</span>
                <span>Anabul is safe, employers are happy</span>
            </div>
            <div class="but">
                <a href="#main">Show More</a>
            </div>
        </div>
    </header>
    <main>
        <div id="main" class="header">
            <a href="<?= router::url('/shop#main') ?>"><i class="fi fi-br-arrow-small-left"></i></a>
            <span>Showing <b>
                    <?= $data['totalProduct'] ?>
                </b> Detail Product</span>
        </div>
        <div class="body">
            <div class="content">
                <div class="image">
                    <img src="<?= $data['showProduct']->product_image; ?>" alt="">
                </div>
                <div class="desc">
                    <div class="head">
                        <span>
                            <?= $data['showProduct']->category_name ?>
                        </span>
                        <h3>
                            <?= $data['showProduct']->product_name ?>
                        </h3>
                    </div>
                    <div class="price">
                        <h3>Rp. <?= number_format($data['showProduct']->retail_price, 0, ',', '.') ?>
                        </h3>
                    </div>
                    <div class="description">
                        <span>
                            <?= $data['showProduct']->product_detail ?>
                        </span>
                    </div>
                    <div class="butt">
                        <a href="#">Add To Cart</a>
                    </div>
                </div>
            </div>
            <div class="side-cart">
                <div class="cart">
                    <div class="header">
                        <span>Cart</span>
                    </div>
                    <div class="body">
                        <!-- render cart here -->
                        <div style="display: <?= $data['display'] ?>;" class="card-empty">
                            <span>No Products in the Cart</span>
                        </div>
                    </div>
                </div>
                <div class="categories">
                    <div class="header">
                        <h3>Product Categories</h3>
                    </div>
                    <div class="body">
                        <ul>    
                            <?php
                            foreach ($data['showCategories'] as $category) {
                            ?>
                                <li><a href="<?= router::url("/category/$category->category_name#main") ?>">
                                        <?= $category->category_name ?>
                                    </a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>