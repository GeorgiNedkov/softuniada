<?php

require_once 'app.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
    throw new App\Exceptions\LoginException("This page is restricted only for allready logged in users");
}

if ($_SESSION["type"] == "user") {

    $profile = new App\Service\User\UserService($db);

    $currentUser = $profile->getUserbyid($_SESSION['user_id']);

} elseif ($_SESSION["type"] == "bisness") {
    $profile = new App\Service\Profile\BisnessProfile($db);

    $currentUser = $profile->getUserbyid($_SESSION['user_id']);

} else {
    throw new App\Exceptions\LoginException("This page is restricted only for allready logged in users");
}
include 'nav.php';
include_once "./frontend/EditProfileInfo_frontend.php";