<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service\User;

interface userServiceInterface {

    public function register(string $firstName, string $lastName, string $nickname, string $email, string $password, string $confirmPassword, string $phone, \DateTime $birthday);

    public function login(string $username, string $password);
}
