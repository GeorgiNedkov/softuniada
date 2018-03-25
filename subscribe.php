<?php

include 'app.php';

if(!isset($_SESSION["user_id"])){
    throw new App\Exceptions\LoginException("this opperation is only for loged in user");
}
//var_dump($_GET["time"]);

$query = "INSERT INTO subscription (
                     `date`,
                     user_id,
                     bisness_name,
                     date1
                    ) VALUES (
                       ?,
                       ?,
                       ?,
                       ?
                       
    )";

$d = new DateTime($_POST['date'] . $_POST["time"] . ":00");
// echo $d->format('Y-m-d H:i:s');
$stmt = $db->prepare($query);
$stmt->execute(
        [
            $d->format('Y-m-d H:i:s'),
            intval($_SESSION["user_id"]),
            $_SESSION["lastSearched"],
            $_POST["date"]
        ]
);

header("Location: ./Profile.php?name=".$_SESSION["lastSearched"]);