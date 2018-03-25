<?php

namespace App\Service\business;

interface userServiceInterface {

    public function register(string $nickname, string $email, string $password, string $confirmPassword, string $phone);

    public function login(string $username, string $password);
}
