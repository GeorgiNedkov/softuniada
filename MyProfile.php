<?php

require_once 'app.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
    throw new App\Exceptions\LoginException("This page is restricted to logged in users");
}

if ($_SESSION["type"] == "user") {

    $profile = new App\Service\User\UserService($db);

    $currentUser = $profile->getUserbyid($_SESSION['user_id']);
    $subscriptions = $profile->getSubscriptions($_SESSION["user_id"]);
    include 'nav.php';
    include './frontend/MyProfile_frontend.php';
} elseif ($_SESSION["type"] == "bisness") {
    $profile = new App\Service\Profile\BisnessProfile($db);

    $currentUser = $profile->getUserbyid($_SESSION['user_id']);
    $subscriptions = $profile->getSubscriptionsByName($currentUser["name"]);
    include 'nav.php';
    include './frontend/MyProfile_frontend.php';
} else {
    throw new App\Exceptions\LoginException("You must login");
}


