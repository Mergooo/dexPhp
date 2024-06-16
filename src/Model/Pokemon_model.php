<?php

namespace App\Model;

use App\Services\Database;
use Envms\FluentPDO\Query;
use PDOStatement;

class Pokemon_model implements ModelInterface
{
    private Query $db;

    public function __construct()
    {
        $this->db = (new Database())->getFluent();
    }

    public function findAll(): mixed
    {
        return $this->db->from('pokemon')->fetchAll();
    }

    public function findById($id): mixed
    {
        return $this->db->from('pokemon')->where('id', $id)->fetch();
    }
}