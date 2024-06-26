<?php

namespace App\Controller;

use App\Model\PokemonModel;
use App\Services\OpenAIService;
use Twig\Environment;

class PokemonController extends BaseController
{
    private PokemonModel $model;
    private OpenAIService $openAIService;
    private Environment $twig;
    // Constructor to initialize the PokemonModel
    public function __construct(Environment $twig)
    {
        $this->model = new PokemonModel();
        $this->openAIService = new OpenAIService();
        $this->twig = $twig;
        
    }

    // Method to display the list of all Pokemon
    public function index()
    {
        $pokemon = $this->model->findAll();

        // Load the view and pass the Pokemon data
        echo $this->twig->render('pokemon/index.html.twig', ['pokemon' => $pokemon]);
    }

    public function showPokedexEntry($name)
    {
        $entry = $this->openAIService->generatePokedexEntry($name);
        parent::loadView('pokedex_entry', 'pokemon', ['entry' => $entry]);
    }
 
}