<?php

namespace App\Services;

use Envms\FluentPDO\Query;
use PDO;

require_once __DIR__ . '/../config.php';

class Database
{
    private Query $fluent;

    public function __construct()
    {
        $pdo = new PDO('mysql:dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        $this->fluent = new Query($pdo);
    }

    public function getFluent()
    {
        return $this->fluent;
    }
}