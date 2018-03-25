<?php

include_once 'app.php';
$profile = new App\Service\Profile\BisnessProfile($db);

$currentUser = $profile->getUser($_GET["name"]);
if (isset($_GET["date"]) && $_GET["date"] != "today") {
    $date = $_GET["date"];
} else {
    $d = new DateTime('now');
//    $d->add(DateInterval::createfromdatestring('+1 day'));
    $date = $d->format('Y-m-d');
}
$subscriptions = $profile->getSubscriptions($_GET["name"], $date);

if ($currentUser == "") {
    header("Location: search.php");
}

$_SESSION["lastSearched"] = $_GET['name'];

//$chunks = explode(';', $currentUser["string_with_services"]);
//$len = count($chunks);
//for ($i = 0; $i < $len; $i++) {
//
//    $chunks[$i] = array_combine(array_column(array_chunk(preg_split('/(-|,)/', $chunks[$i]), 2), 0), array_column(array_chunk(preg_split('/(-|,)/', $chunks[$i]), 2), 1));
//}
include 'nav.php';
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$work_time = include './frontend/Profile_frontend.php';
