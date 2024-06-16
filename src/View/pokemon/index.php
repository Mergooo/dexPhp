<?php
echo "pokemon - index seite";

//echo "<pre>";
//print_r($jobs);
//echo "</pre>";

if (is_array($pokemon)) {
    foreach ($pokemon as $poke_1) {
        echo "<p>Titel: " . htmlspecialchars($poke_1['name']) . "</p>";
//        echo "<p>Beschreibung: " . htmlspecialchars($job['beschreibung']) . "</p>";
        echo '<a href="/pokemon/' . htmlspecialchars($poke_1['id']) . '">Details</a> ';
        echo '<a href="/pokemon/' . htmlspecialchars($poke_1['id']) . '/edit">Bearbeiten</a> ';
        echo '<a href="/pokemon/' . htmlspecialchars($poke_1['id']) . '/delete">Löschen</a>';
    }
} else {
    echo "<p>Aktuell keine pokemon vorhanden </p>";
}