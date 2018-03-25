<?php

namespace App\Service\search;

use App\Data\DatabaseInterface;

class SearchBusiness {



    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function getAllBusiness() {
        $query = "select * FROM bisness order by name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_NUM);
    }

    public function getAllProfessions() {
        $stmt = $this->db->prepare("SELECT id, name FROM professions order by id");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
