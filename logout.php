<?php

include 'app.php';

$_SESSION["user_id"] = null;
$_SESSION["type"] = null;

header("Location: ./login.php");