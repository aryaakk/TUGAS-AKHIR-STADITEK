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
            <span>Showing All <b>
                    <?= $data['totalProduct'] ?>
                </b> Result</span>
        </div>
        <div class="body">
            <div class="product">
                <?php
                foreach ($data['showProduct'] as $product) {
                    $price = $product->retail_price;
                    $price_format = number_format($price, 0, ',', '.');
                ?>
                    <div class="card">
                        <a href="">
                            <div class="image">
                                <img src="<?= $product->product_image ?>" alt="">
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="title">
                                <span class="category">
                                    <?= $product->category_name ?>
                                </span>
                                <span class="sort">
                                    <?php
                                    if ($product->product_name < 15) {
                                        echo $product->product_name;
                                    } else {
                                        echo substr($product->product_name, 0, 20) . '...';
                                    }
                                    ?>
                                </span>
                                <span class="show">
                                    <?= $product->product_name ?>
                                </span>
                            </div>
                            <div class="price">
                                <span>Rp. <?= $price_format ?></span>
                            </div>
                            <div class="butt">
                                <div class="show-more">
                                    <a href="<?= router::url("/detailProduct/$product->pet_product_id#main") ?>"><i class="fi fi-bs-apps-sort"></i></a>
                                </div>
                                <div class="add-tochart">
                                    <a href="<?= router::url("/shop/$product->pet_product_id#main") ?>"><i class="fi fi-br-shopping-cart-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
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