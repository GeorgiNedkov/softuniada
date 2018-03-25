<?php

require_once 'app.php';

$userService = new App\Service\User\UserService($db, $encryptionService);
if (isset($_POST['register'])) {
    $uploadService = new App\Service\Upload\UploadService();

//    $avatarUrl = null;
//    if ($_FILES['avatar']['error'] === 0) {
//        $avatarUrl = $uploadService->upload(
//            $_FILES['avatar'],
//            'avatars'
//        );
//    }

    $userService->register(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['nickname'],
        $_POST['email'],
        $_POST['password'],
        $_POST['confirm'],
        $_POST['phone'],
        new DateTime($_POST['birthday'])
    );
    throw new App\Exceptions\LoginException ("Now you can logged in");
}


// $infoForTemplate = $userService->getRegisterViewData();

//$app->loadTemplate('registerUser_frontend');
include 'nav.php';
include_once "./frontend/registerUser_frontend.php";