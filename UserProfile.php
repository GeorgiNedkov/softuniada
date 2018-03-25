<?php

include 'app.php';


if (isset($_GET['user'])) {
    $query = "SELECT first_name, last_name, picture FROM users
WHERE nickname = ? ";
    $stmt = $db->prepare($query);
    $stmt->execute(
            [
                $_GET['user'],
            ]
    );
    $user=$stmt->fetchrow();
    var_dump($user);
}