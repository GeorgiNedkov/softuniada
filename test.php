<?php

include_once 'app.php';
if (isset($_POST['login'])&&isset($_POST["type"])) {
    if ($_POST["type"] == "user") {
        $userService = new App\Service\User\UserService($db, $encryptionService);
        $username = $_POST['nickname'];
        $password = $_POST['password'];

        if (!($userService->login($username, $password))) {

            throw new App\Exceptions\LoginException("Password mismatch!");
        }

        header("Location: MyProfile.php");
        exit;
    }
    if ($_POST["type"] == "business") {
        $BusinessService = new App\Service\business\BusinessService($db, $encryptionService);
        $username = $_POST['nickname'];
        $password = $_POST['password'];

        if (!($BusinessService->login($username, $password))) {

            throw new App\Exceptions\LoginException("Password mismatch!");
        }

        header("Location: MyProfile.php");
        exit;
    }
 
}