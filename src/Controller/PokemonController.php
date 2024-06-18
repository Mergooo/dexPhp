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
    # nächstes:
    # create zeigt formular für create an (CRUD), dass man neuen trainer hinzufügt
    # store ist dafür zuständig dass sachen in die daten in die db geschrieben werden
 
}