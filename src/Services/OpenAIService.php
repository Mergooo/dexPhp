<?php

namespace App\Services;

use OpenAI;

class OpenAIService
{
    private $client;

    public function __construct()
    {
    
        require_once __DIR__ . '/../config.php';
        $apiKey = OPENAI_API_KEY; // Use the API key from the config

        // Initialize the OpenAI client
        $this->client = OpenAI::client($apiKey);
    }

    public function generatePokedexEntry($pokemonName)
    {
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are over the top cool and you finish every sentence with bro.'],
                ['role' => 'user', 'content' => "Generate a Pokedex entry for the Pokémon named $pokemonName."],
            ],
        ]);

        return $response['choices'][0]['message']['content'] ?? 'No entry found';
    }
}
