<?php

namespace App\Service\business;

use App\modules\User\User;
use App\Data\DatabaseInterface;
use App\Exceptions\RegisterException;
use App\Service\Encryption\EncryptionServiceInterface;

class BusinessService {

    const MIN_NAME_LENGHT = 4;

    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    public function __construct(DatabaseInterface $db, EncryptionServiceInterface $encryptionService) {
        $this->db = $db;
        $this->encryptionService = $encryptionService;
    }

    public function register(string $username, string $email, string $password, string $confirmPassword, string $phone, string $profession, string $location, string $description, $time) {
        if ($password != $confirmPassword) {
            throw new RegisterException("Password mismatch");
        }
        if (strlen($username) <= self::MIN_NAME_LENGHT) {
            throw new RegisterException("Too short name");
        }
        $passwordHash = $this->encryptionService->encrypt($password);

        $query = "INSERT INTO bisness (
                       name,
                       email,
                       phone,
                       location,
                       profession,
                       password,
                       description,
                       time_for_service
                    ) VALUES (
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?
    )";
        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $username,
                    $email,
                    $phone,
                    $location,
                    intval($profession),
                    $passwordHash,
                    $description,
                    intval($time)
                ]
        );
    }

    public function login($username, $password): bool {
        $query = "SELECT
                   id,
                   password
                FROM
                   bisness
                WHERE
                   name = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);
        /** @var User $user */
        $user = $stmt->fetchObject(User::class);
        if (!$user) {
            return false;
        }

        $passwordHash = $user->getPassword();

        if ($this->encryptionService->isValid($passwordHash, $password)) {
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['type'] = "bisness";
            return true;
        }

        return false;
    }

    public function getAllprofessions() {
        $stmt = $this->db->prepare("SELECT id, name FROM professions");
        $stmt->execute();
        $professions = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $professions;
    }

}
