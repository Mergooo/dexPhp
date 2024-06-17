<?php

namespace App\Controller;

use App\Model\PokemonModel;

class PokemonController extends BaseController
{
    private PokemonModel $model;

    public function __construct()
    {
        $this->model = new PokemonModel();
    }

    public function index()
    {
        $pokemon = $this->model->findAll();

        parent::loadView('index', 'pokemon', ['pokemon' => $pokemon]);
    }
}
