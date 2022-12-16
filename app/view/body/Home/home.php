<?php

use staditek\TugasAkhir\App\core\router;

?>
<section id="maincontent">
    <header>
        <div class="content left">
            <div class="img">
                <img src="<?= router::url('/assets/img/left-side-1.png') ?>" alt="">
            </div>
        </div>
        <div class="content center">
            <div class="header">
                <i class="fa-solid fa-paw"></i>
                <h3><b>HI,</b> we are AniPets</h3>
                <span>Premium Pet Food, Best Service & Premium Item</span>
                <span>Anabul is safe, employers are happy</span>
            </div>
            <div class="but">
                <a href="#main">Show More</a>
            </div>
        </div>
        <div class="content right">
            <div class="img">
                <img src="<?= router::url('/assets/img/right-side.png') ?>" alt="">
            </div>
        </div>
    </header>
    <div id="main"></div>
    <main>
        <div class="content first">
            <div class="left" style="flex-grow: 2;">
                <div class="head">
                    <h3><b>Premium</b> Pet Food Manufacture</h3>
                </div>
                <div class="body">
                    <h4>because we work with premium pet food products. and has been verified as fit for consumption and
                        the quality of the ingredients for our anabul. and also all of our animal food is also monitored
                        by the food brand itself. Therefore, our pet food must be updated and the quality is maintained
                    </h4>
                </div>
            </div>
            <div class="right" style="flex-grow: 10;">
                <div class="image">
                    <img src="<?= router::url('/assets/img/food2.png') ?>" alt="">
                </div>
            </div>
        </div>
        <div class="content second">
            <div class="head">
                <span><b>Best</b> Service</span>
            </div>
            <div class="body">
                <div class="left">
                    <div class="image">
                        <img src="<?= router::url('/assets/img/pet-service.jpg') ?>" alt="">
                    </div>
                </div>
                <div class="right">
                    <h1>To The Best For Your <b>Pet</b></h1>
                    <span>our service prioritizes customer comfort, as it should be. and from our service you can also
                        trust it 100% because all of our employees who will do the work have been trained and equipped
                        with adequate knowledge</span>
                    <div class="list-detail">
                        <div class="list">
                            <i class="fa-solid fa-shower"></i>
                            <span>Pet Grooming</span>
                        </div>
                        <div class="list">
                            <i class="fa-solid fa-scissors"></i>
                            <span>Styling</span>
                        </div>
                        <div class="list">
                            <i class="fa-solid fa-cat"></i>
                            <span>Animal Boarding</span>
                        </div>
                        <div class="list">
                            <i class="fa-solid fa-person-running"></i>
                            <span>Fun Activities</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content third">
            <div class="left" style="flex-grow: 2;">
                <div class="head">
                    <h3><b>Premium</b> Item and Another <b>Pet</b> Product</h3>
                </div>
                <div class="body">
                    <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis at dolorem nisi fugit placeat,
                        voluptatum modi repudiandae tempora perferendis qui quod saepe temporibus cum aliquam nulla,
                        iure quibusdam debitis rerum cumque ut deserunt necessitatibus id eos ducimus. Minima libero
                        sint nisi in saepe, maiores velit sunt, magni pariatur, quis consectetur. Quo mollitia at quidem
                        impedit numquam atque sit eaque deserunt maiores iste expedita exercitationem blanditiis
                        distinctio, voluptatibus nam fugiat itaque.</h4>
                </div>
            </div>
            <div class="right" style="flex-grow: 10;">
                <div class="image">
                    <img src="<?= router::url('/assets/img/third1.jpg') ?>" alt="">
                </div>
            </div>
        </div>
        <div class="content fourth">
            <div class="header">
                <h1><b>Brands</b> Available</h1>
            </div>
            <div class="body">
                <div class="head">
                    <span>all brands available in our pet store, to support the needs of your anabul. We offer the best
                        brands in pet food</span>
                </div>
                <div class="content">
                    <?php
                    foreach ($data['showBrands'] as $brand) {
                    ?>
                    <a href="<?= router::url("/showProductBrand/$brand->company_name#main")?>">
                        <div class="card">
                            <div class="image">
                                <img src="<?= router::url('/assets/img/' . $brand->company_profile . '') ?>" alt="">
                            </div>
                            <div class="brand">
                                <span>
                                    <?= $brand->company_name ?>
                                </span>
                            </div>
                        </div>
                    </a>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="content fifth">
            <div class="header">
                <h1>About <b>Us</b></h1>
                <p>From the time our friends sniff their way through the door in the morning until they wag their tails
                    out in the afternoon, we cater to their nature.</p>
            </div>
            <div class="body">
                <div class="card">
                    <div class="icon">
                        <img src="<?= router::url('/assets/img/animals.png') ?>" alt="">
                    </div>
                    <div class="text">
                        <h2>Quality Care</h2>
                        <span>We are committed to helping you maintain care and health well-being of your pets.</span>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="<?= router::url('/assets/img/pet-toy.png') ?>" alt="">
                    </div>
                    <div class="text">
                        <h2>Pet Accessories</h2>
                        <span>We are committed to helping you maintain care and health well-being of your pets.</span>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="<?= router::url('/assets/img/walk.png') ?>" alt="">
                    </div>
                    <div class="text">
                        <h2>Fun Activities</h2>
                        <span>We are committed to helping you maintain care and health well-being of your pets.</span>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="<?= router::url('/assets/img/milk-box.png') ?>" alt="">
                    </div>
                    <div class="text">
                        <h2>Natural Products</h2>
                        <span>We are committed to helping you maintain care and health well-being of your pets.</span>
                    </div>
                </div>
            </div>
            <div class="detail-about">
                <div class="left">
                    <div class="head">
                        <h1>Caring Your <b>Pets</b></h1>
                    </div>
                    <div class="body">
                        <span>Aliquam erat volutpat In id fermentum augue, ut pellentesque leo. Maecenas at arcu
                            risus. Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna
                            nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum
                            convall.</span>
                        <p>Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall Maecenas at arcu risus
                            scelerisque laoree.</p>
                    </div>
                </div>
                <div class="right">
                    <div class="image">
                        <img src="<?= router::url('/assets/img/cat-about.jpg') ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content sixth">
            <div class="header">
                <h2><b>Contact</b> Us</h2>
                <span>Mei te apeirian omittantur reformidans,<br> duo in appetere interesset concludaturque. Est eruditi
                    erroribus liberavisse in.</span>
            </div>
            <div class="body">
                <div class="left">
                    <div class="mapouter">
                        <div class="gmap_canvas map"><iframe width="801" height="550" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=Ruko%20Kebayoran%20Arcade%202,%20Jl.%20Boulevard%20Bintaro%20Jaya%20No.7,%20Bintaro,%20Pondok%20Aren,%20South%20Tangerang%20City,%20Banten%2015224&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                href="https://123movies-to.org"></a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 550px;
                                    width: 801px;
                                }
                            </style><a href="https://www.embedgooglemap.net"></a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 550px;
                                    width: 801px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="card">
                        <div class="image">
                            <img src="<?= router::url('/assets/img/card-contact.jpg') ?>" alt="">
                        </div>
                        <div class="body">
                            <div class="list">
                                <div class="icon">
                                    <img src="<?= router::url('/assets/img/location.png') ?>" alt="">
                                </div>
                                <div class="ket">
                                    <h3>Address</h3>
                                    <span>Bintaro Kebayoran Arcade 2</span>
                                </div>
                            </div>
                            <div class="list">
                                <div class="icon">
                                    <img src="<?= router::url('/assets/img/call.png') ?>" alt="">
                                </div>
                                <div class="ket">
                                    <h3>Telephone</h3>
                                    <span>+62 987654321</span>
                                    <span>+62 987654322</span>
                                </div>
                            </div>
                            <div class="list">
                                <div class="icon">
                                    <img src="<?= router::url('/assets/img/address.png') ?>" alt="">
                                </div>
                                <div class="ket">
                                    <h3>Email Address</h3>
                                    <span>anipets@anipets.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>