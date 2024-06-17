<?php

namespace App\Model;

use App\Services\Database;
use PDO;

class TrainerModel implements ModelInterface {
    public function findAll(): array {
        $db = Database::getInstance();
        $stmt = $db->query(" SELECT t.id AS trainer_id, t.name AS trainer_name, p.name AS pokemon_name
            FROM trainer AS t
            LEFT JOIN pokemon AS p ON t.pokemon_id = p.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id): array {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM trainer WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}