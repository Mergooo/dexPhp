<?php

namespace App\Controller;

use App\Model\PokemonModel;
use App\Services\OpenAIService;

class PokemonController extends BaseController
{
    private PokemonModel $model;
    private OpenAIService $openAIService;
    // Constructor to initialize the PokemonModel
    public function __construct()
    {
        $this->model = new PokemonModel();
        $this->openAIService = new OpenAIService();
        
    }

    // Method to display the list of all Pokemon
    public function index()
    {
        $pokemon = $this->model->findAll();

        // Load the view and pass the Pokemon data
        parent::loadView('index', 'pokemon', ['pokemon' => $pokemon]);
    }

    public function showPokedexEntry($name)
    {
        $entry = $this->openAIService->generatePokedexEntry($name);
        parent::loadView('pokedex_entry', 'pokemon', ['entry' => $entry]);
    }
 
}