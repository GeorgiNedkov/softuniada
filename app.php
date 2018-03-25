<?php

session_start();

set_exception_handler(function(Exception $e) {
    if ($e instanceof App\Exceptions\RegisterException) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: registeruser.php");
        exit;
    }

    if ($e instanceof App\Exceptions\LoginException) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: login.php");
        exit;
    }

    if ($e instanceof PDOException) {
        echo "<h1>SOMETHING WHENT WRONG ! ! ! ! ! ! !!!!</h1>";
    }
});

spl_autoload_register(function($class) {
    $class = str_replace("App\\", "", $class);
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require $class . '.php';
});


$db = new \App\Data\PDODatabase(
        \App\Config\DbConfig::DB_HOST,
        \App\Config\DbConfig::DB_NAME,
        \App\Config\DbConfig::DB_USER,
        \App\Config\DbConfig::DB_PASS
);



//$app = new \Core\Application();
$encryptionService = new App\Service\Encryption\BCryptEncryptionService();
