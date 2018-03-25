<?php

namespace App\Service\Profile;

use App\Data\DatabaseInterface;

class BisnessProfile {

    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function getUser($name) {
        $query = "SELECT bisness.description,
        bisness.name, 
                bisness.phone, 
	 	professions.name as profession, 
	  	bisness.picture, 
	  	bisness.start_working,
	  	bisness.start_lunch,
	  	bisness.stop_lunch,
	  	bisness.stop_working,
                bisness.time_for_service
                	FROM bisness
	INNER JOIN 
		professions
	on 
		bisness.profession=professions.id

	WHERE bisness.name = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $name
                ]
        );
        $currentUser = $stmt->fetchrow();
        return $currentUser;
    }

    public function getUserById($id) {
        $query = "SELECT bisness.description,
        bisness.name, 
                bisness.phone, 
	 	professions.name as profession, 
	  	bisness.picture,
                bisness.start_working,
                bisness.stop_working,
                bisness.start_lunch,
                bisness.stop_lunch,
                bisness.time_for_service
	FROM bisness
	INNER JOIN 
		professions
	on 
		bisness.profession=professions.id
	WHERE bisness.id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $id,
                ]
        );
        $currentUser = $stmt->fetchRow();
        return $currentUser;
    }

    public function getSubscriptions($name, $date) {
        $query = 'SELECT `date`
        FROM subscription
		where bisness_name = ? and date1 = ?;';
        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $name,
                    $date
                ]
        );
        $subscriptions = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $subscriptions;
    }

    public function getSubscriptionsByName($name) {
        $query = "SELECT 
    subscription.date,
    users.first_name as name,
    users.last_name as name2
        from subscription
        inner join
    users
        ON
     subscription.user_id=users.id
        where 
    subscription.bisness_name = ? and date1 >= DATE(now())";
        $stmt = $this->db->prepare($query);
        $stmt->execute(
                [
                    $name
                ]
        );
        $subscriptions = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $subscriptions;
    }

}
