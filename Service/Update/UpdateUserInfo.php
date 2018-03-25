<?php

namespace App\Service\Update;

use App\Service\Encryption\EncryptionServiceInterface;
use App\Data\DatabaseInterface;

class UpdateUserInfo {

    /**
     * @var DatabaseInterface
     */
    private $db;
    private $user_id;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    public function __construct(DatabaseInterface $db, $user_id, EncryptionServiceInterface $encryptionService = null) {
        $this->encryptionService=$encryptionService;
        $this->db = $db;
        $this->user_id = $user_id;
    }

    public function UpdatePicture($url) {
        $query = "UPDATE users 
            SET picture=?
            WHERE id=?
";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $url,
                    $this->user_id
                ]
        );
    }

    public function UpdateFirstName($firstname) {
        $query = "UPDATE users 
            SET first_name=?
            WHERE id=?
";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $firstname,
                    $this->user_id
                ]
        );
    }

    public function UpdateLastName($LastName) {
        $query = "UPDATE users 
            SET last_name=?
            WHERE id=?";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $LastName,
                    $this->user_id
                ]
        );
    }

    public function UpdatePhone($phone) {
        $query = "UPDATE users 
            SET phone=?
            WHERE id=?
";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $phone,
                    $this->user_id
                ]
        );
    }

    public function UpdateBurthDay($bornON) {
        $query = "UPDATE users 
            SET born_on=?
            WHERE id=?
";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $bornON,
                    $this->user_id
                ]
        );
    }

    public function UpdatePassword($oldpassword, $newpassword, $confirm) {
        $stmt = $this->db->prepare("SELECT password FROM users where id=?");
        $stmt->execute(
                [
                    $this->user_id
                ]
        );
        $passwordHash = $stmt->fetchRow();
        if (!$this->encryptionService->isValid($passwordHash["password"], $oldpassword)) {
            throw new \Exceptions("something went wrong check your inputs");
        } elseif ($newpassword == $confirm) {
            $query = "UPDATE users 
            SET password=?
            WHERE id=?
";

            $stmt = $this->db->prepare($query);
            $stmt->execute(
                    [
                        $this->encryptionService->encrypt($newpassword),
                        $this->user_id
                    ]
            );
        } else {
            throw new \Exceptions("something went wrong your inputs");
        }
    }

}
