<?php

namespace App\Model;

interface ModelInterface
{
    public function findAll(): mixed;

    public function findById($id): mixed;
}