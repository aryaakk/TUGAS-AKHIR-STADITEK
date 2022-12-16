<?php

use staditek\TugasAkhir\App\core\router;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= router::url('/assets/img/navbarBrand.png') ?>">

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>

    <link rel="stylesheet" href="<?= router::url('/assets/css/template/header.css') ?>">
    <link rel="stylesheet" href="<?= router::url('/assets/css/' . $data['style'] . '.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>
        <?= $data['title'] ?> | aniPets
    </title>
</head>

<body>
    <div class="wrapperNav">
        <nav>
            <div class="nav">
                <div class="navbrand">
                    <div class="image">
                        <img class="img1" src="<?= router::url('/assets/img/new.png') ?>" alt="">
                        <img class="img2" src="<?= router::url('/assets/img/navbarBrand.png') ?>" alt="">
                    </div>
                    <div class="text">
                        <span>AniPets</span>
                    </div>

                </div>
                <ul>
                    <li><a class="<?= $data['activeShop'] ?>" href="<?= router::url('/shop')?>">Shop</a></li>
                    <li><a class="<?= $data['activeService'] ?>" href="<?= router::url('/Services')?>">Service</a></li>
                    <li><a class="<?= $data['activeAdopt'] ?>" href="<?= router::url('/adopt')?>">Adopt</a></li>
                </ul>
            </div>
            <div class="nav-side">
                <ul>
                    <li><a href="<?= router::url('/login')?>">Sign Up</a></li>
                    <li><i class="fa-solid fa-magnifying-glass"></i></li>
                </ul>
            </div>
        </nav>
    </div>