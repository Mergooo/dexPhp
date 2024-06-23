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
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => "Generate a Pokedex entry for the Pokémon named $pokemonName."],
            ],
        ]);

        return $response['choices'][0]['message']['content'] ?? 'No entry found';
    }
}
