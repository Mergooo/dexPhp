<?php

namespace App\Services;

use Envms\FluentPDO\Query;
use PDO;

require_once __DIR__ . '/../config.php';

class Database {
    private Query $fluent;
    private PDO $pdo;
    private static $instance = null; 

    // コンストラクタをプライベートにして外部からのインスタンス化を禁止
    private function __construct() {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $this->fluent = new Query($this->pdo);
    }

    // Public static method to get the single instance
    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Method to get the PDO instance
    public function getPdo(): PDO {
        return $this->pdo;
    }

    // Method to get the FluentPDO instance
    public function getFluent(): Query {
        return $this->fluent;
    }
}
