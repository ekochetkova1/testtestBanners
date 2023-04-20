<?php

    declare(strict_types=1);

    require_once 'vendor/autoload.php';

    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__, '.env');
    $dotenv->load();

    require_once 'Classes/DBConnection.php';
    require_once 'Classes/UserVisits.php';
    require_once 'Classes/UserModel.php';
    require_once 'Classes/Image.php';

    $userVisits = new \Classes\UserVisits();
    $userVisits->setUserViews();

    $image = new \Classes\Image();
    echo $image->getImage();
