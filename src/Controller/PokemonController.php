<?php

namespace App\Controller;

use App\Model\PokemonModel;

class PokemonController extends BaseController
{
    private PokemonModel $model;

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
