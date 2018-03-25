<?php

include "app.php";

if ($_SESSION["type"] == "user") {

    $currentUser = new App\Service\Update\UpdateUserInfo($db, $_SESSION["user_id"], $encryptionService);
    if (isset($_FILES["avatar"])) {
        $uploadService = new App\Service\Upload\UploadService();

        $avatarUrl = null;
        if ($_FILES['avatar']['error'] === 0) {
            $avatarUrl = $uploadService->upload(
                    $_FILES['avatar'], 'avatars'
            );
        }
        $currentUser->UpdatePicture($avatarUrl);
    }

    if (isset($_POST["FirstName"])) {
        $currentUser->UpdateFirstName($_POST["FirstName"]);
    }

    if (isset($_POST["LastName"])) {
        $currentUser->UpdateLastName($_POST["LastName"]);
    }

    if (isset($_POST["BornOn"])) {
        $currentUser->UpdateBurthDay($_POST["BornOn"]);
    }

    if (isset($_POST["phone"])) {
        $currentUser->UpdatePhone($_POST["phone"]);
    }

    if (isset($_POST["NewPassword"])) {
        $currentUser->UpdatePassword($_POST["OldPassword"], $_POST["NewPassword"], $_POST["confirm"]);
    }
}

if ($_SESSION["type"] == "bisness") {
    $currentUser = new App\Service\Update\UpdateBusinessInfo($db, $_SESSION["user_id"], $encryptionService);
    if (isset($_FILES["avatar"])) {
        $uploadService = new App\Service\Upload\UploadService();

        $avatarUrl = null;
        if ($_FILES['avatar']['error'] === 0) {
            $avatarUrl = $uploadService->upload(
                    $_FILES['avatar'], 'avatars'
            );
        }
        $currentUser->UpdatePicture($avatarUrl);
    }

    if (isset($_POST["phone"])) {
        $currentUser->UpdatePhone($_POST["phone"]);
    }

    if (isset($_POST["StartWork"])) {
        $currentUser->UpdateWorkingTime($_POST["StartWork"], $_POST["StartLunch"], $_POST["StopLunch"], $_POST["StopWork"]);
    }
    if (isset($_POST["NewPassword"])) {
        $currentUser->UpdatePassword($_POST["OldPassword"], $_POST["NewPassword"], $_POST["confirm"]);
    }
}
header("Location: ./MyProfile.php");
