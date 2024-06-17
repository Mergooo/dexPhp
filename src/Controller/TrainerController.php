<?php

namespace App\Controller;

use App\Model\TrainerModel;

class TrainerController extends BaseController
{
    private TrainerModel $model;

    public function __construct()
    {
        $this->model = new TrainerModel();
    }

    public function index()
    {
        $trainer = $this->model->findAll();

        parent::loadView('index', 'trainer', ['trainer' => $trainer]);
    }
}
