<?php

namespace App\Services;

use Envms\FluentPDO\Query;
use PDO;

require_once __DIR__ . '/../config.php';

class Database {
    private Query $fluent;
    private static $instance = null; 

    public function __construct() {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        $this->fluent = new Query($pdo);
    }

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            self::$instance = new PDO($dsn, DB_USER, DB_PASSWORD);
        }
        return self::$instance;
    }

    public function getFluent() {
        return $this->fluent;
    }
}