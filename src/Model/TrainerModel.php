<?php

namespace App\Model;

use App\Services\Database;
use PDO;

class TrainerModel implements ModelInterface {
    public function findAll(): array {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM trainer");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id): array {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM trainer WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}