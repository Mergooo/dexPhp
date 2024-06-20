<?php

namespace App\Model;

use App\Services\Database;
use PDO;

class PokemonModel implements ModelInterface {

    private $db;

    public function __construct()
    {
        // Databaseクラスのインスタンスを取得
        $this->db = Database::getInstance()->getPdo();
    }
      public function findAll(): array
    {
        // PDOオブジェクトを使用してクエリを実行
        $stmt = $this->db->query("SELECT * FROM pokemon");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findById($id): array {
        $db = Database::getInstance();
        $stmt = $this->db->prepa("SELECT * FROM pokemon WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    }
}