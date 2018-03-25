<?php

namespace App\Service\Update;

use App\Data\DatabaseInterface;
use App\Service\Encryption\EncryptionServiceInterface;

class UpdateBusinessInfo {

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
        $this->db = $db;
        $this->user_id = $user_id;
        $this->encryptionService=$encryptionService;
    }

    public function UpdatePicture($url) {
        $query = "UPDATE bisness 
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

    public function UpdateWorkingTime($x, $x1, $x2, $x3) {
        $startw = "0000-00-00 " . $x . ":00";
        $startl = "0000-00-00 " . $x1 . ":00";
        $stopl = "0000-00-00 " . $x2 . ":00";
        $stopw = "0000-00-00 " . $x3 . ":00";
        $query = "UPDATE bisness   
            SET start_working = ?,
            start_lunch = ?,
            stop_lunch = ?,
            stop_working = ?
            WHERE id=?
";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $startw,
                    $startl,
                    $stopl,
                    $stopw,
                    $this->user_id
                ]
        );
    }

    public function UpdatePhone($phone) {
        $query = "UPDATE bisness 
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

    public function UpdatePassword($oldpassword, $newpassword, $confirm) {
        $stmt = $this->db->prepare("SELECT password FROM bisness where id=?");
        $stmt->execute(
                [
                    $this->user_id
                ]
        );
        $passwordHash = $stmt->fetchRow(\PDO::FETCH_LAZY);
        if (!$this->encryptionService->isValid($passwordHash["password"], $oldpassword)) {
            throw new \Exception("something went wrong check your inputs");
        } elseif ($newpassword == $confirm) {
            $query = "UPDATE bisness 
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
            throw new \Exception("something went wrong your inputs");
        }
    }

}
