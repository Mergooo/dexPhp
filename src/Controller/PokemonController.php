<?php

namespace App\Controller;

use App\Model\Pokemon_model;

class PokemonController extends BaseController
{
    private Pokemon_model $model;

    public function __construct()
    {
        $this->model = new Pokemon_model();
    }

    public function index()
    {
        $jobs = $this->model->findAll();

        parent::loadView('index', 'pokemon', ['pokemon' => $pokemon]);
    }
}
