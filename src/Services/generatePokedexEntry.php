<?php

// ChatGPT APIを呼び出す関数（テスト用にダミーデータを返す）
function callChatGPT($pokemonName) {
    // 本来はここでAPI呼び出しを行いますが、テストのためにダミーデータを返します
    return "This is a mock Pokedex entry for $pokemonName.";
}

if (isset($_GET['name'])) {
    $pokemonName = htmlspecialchars($_GET['name']);
    $entry = callChatGPT($pokemonName);
    echo $entry;
} else {
    echo "Error: No Pokemon name provided";
}

