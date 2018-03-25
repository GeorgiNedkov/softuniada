<?php

include_once 'app.php';
$business = new App\Service\search\SearchBusiness($db);
$businesses = $business->getAllBusiness();
$professions = $business->getAllProfessions();
//$professions = $business->getAllProfessions();
include 'nav.php';
include './frontend/Search_frontend.php';
