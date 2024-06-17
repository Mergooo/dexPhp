<?php
echo "pokemon - index seite";

//echo "<pre>";
//print_r($jobs);
//echo "</pre>";

if (is_array($pokemon)) {
    foreach ($pokemon as $poke_1) {
        echo "<p>Nummer: " . htmlspecialchars($poke_1['id']) . "</p>";
        echo "<p>Name: " . htmlspecialchars($poke_1['name']) . "</p>";
        echo "<p>Typ: " . htmlspecialchars($poke_1['element']) . "</p>";
        echo "<br>";
    }
} else {
    echo "<p>Aktuell keine pokemon vorhanden </p>";
}