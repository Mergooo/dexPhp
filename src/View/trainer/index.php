<?php
echo "tainer - index seite";

//echo "<pre>";
//print_r($jobs);
//echo "</pre>";

if (is_array($trainer)) {
    foreach ($trainer as $trainee1) {
        echo "<p>Nummer: " . htmlspecialchars($trainee1['id']) . "</p>";
        echo "<p>Name: " . htmlspecialchars($trainee1['name']) . "</p>";
    }
} else {
    echo "<p>Aktuell keine trainer vorhanden </p>";
}