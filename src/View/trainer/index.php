<?php
echo "tainer - index seite";

//echo "<pre>";
//print_r($jobs);
//echo "</pre>";

if (is_array($trainer)) {
    foreach ($trainer as $trainee1) {
        echo "<p>Nummer: " . htmlspecialchars($trainee1['trainer_id']) . "</p>";
        echo "<p>Trainer Name: " . htmlspecialchars($trainee1['trainer_name']) . "</p>";
        echo "<p>Starterpokemon: " . htmlspecialchars($trainee1['pokemon_name']) . "</p>";
        echo "<br>";
    }
} else {
    echo "<p>Aktuell keine trainer vorhanden </p>";
}