<?php

require_once 'app.php';


$BusinessService = new App\Service\business\BusinessService($db, $encryptionService);
if (isset($_POST['register'])) {
    $uploadService = new App\Service\Upload\UploadService();

//    $avatarUrl = null;
//    if ($_FILES['avatar']['error'] === 0) {
//        $avatarUrl = $uploadService->upload(
//            $_FILES['avatar'],
//            'avatars'
//        );
//    }

    $BusinessService->register(
            $_POST['nickname'], $_POST['email'], $_POST['password'], $_POST['confirm'], $_POST['phone'], $_POST['profession'], $_POST['location'], $_POST['description'], $_POST["TimeService"]
    );
    header("Location: login.php");
    exit;
}

$professions = $BusinessService->getAllprofessions();



//$infoForTemplate = $BusinessService->getRegisterViewData();
//$app->loadTemplate('register_frontend', $infoForTemplate);
include 'nav.php';
include './frontend/register_frontend.php';

