<?php

namespace App\Service\User;

use App\modules\User\User;
use App\Data\DatabaseInterface;
use App\Exceptions\RegisterException;
use App\Service\Encryption\EncryptionServiceInterface;
use App\Service\User\UserServiceInterface;

class UserService implements UserServiceInterface {

    const MIN_NAME_LENGHT = 4;
    const MIN_AGE_ALLOWED = 12;

//    const EMAILREGEX = '/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/';

    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    public function __construct(DatabaseInterface $db, EncryptionServiceInterface $encryptionService = null) {
        $this->db = $db;
        $this->encryptionService = $encryptionService;
    }

    public function register(string $firstName, string $lastName, string $nickname, string $email, string $password, string $confirmPassword, string $phone, \DateTime $birthday) {
        if ($password != $confirmPassword) {
            throw new RegisterException("Password mismatch");
        }
         if ($password=="") {
            throw new RegisterException("Password can not be empty");
        }
        if (strlen($nickname) <= self::MIN_NAME_LENGHT) {
            throw new RegisterException("Too short nickname");
        }
        $passwordHash = $this->encryptionService->encrypt($password);

        $interval = $birthday->diff(new \DateTime('now'));
        if ($interval->y < self::MIN_AGE_ALLOWED) {
            throw new RegisterException("Underage not allowed");
        }
//        $matches = [];
//        var_dump(\preg_match(self::EMAILREGEX, $email));
//        if (!isset($matches[1])) {
//            throw new RegisterException("Wrong pattern for email");
//        }

        $query = "INSERT INTO users (
                       first_name,
                       last_name,
                       nickname,
                       email,
                       phone,
                       password,
                       born_on
                    ) VALUES (
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?,
                       ?
                    );";

        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $firstName,
                    $lastName,
                    $nickname,
                    $email,
                    $phone,
                    $passwordHash,
                    $birthday->format('Y-m-d')
                ]
        );
    }

    public function login(string $username,string $password): bool {
        $query = "SELECT
                   id,
                   password
                FROM
                   users
                WHERE
                   nickname = ?";
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
            $_SESSION['type'] = "user";

            return true;
        }

        return false;
    }

    public function getUserById($id) {
        $query = "SELECT 
        users.first_name, 
        users.last_name, 
        users.born_on, 
        users.picture,
type_user.name as `type`, 
        users.picture, 
        users.phone 
    FROM users
    INNER JOIN 
        `type_user`
    on
        users.type_id = type_user.id
    where users.id=?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $id,
                ]
        );
        $currentUser = $stmt->fetchRow();
        return $currentUser;
    }

    public function getSubscriptions($id) {
        $query = 'SELECT `date`,
            bisness_name
        FROM subscription
		where user_id = ? and date1 >= DATE(now())';
        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $id,
                ]
        );
        $subscriptions = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $subscriptions;
    }

}
