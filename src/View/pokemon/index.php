
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon List</title>

</head>
<body>
<?php

if (is_array($pokemon)) {
    foreach ($pokemon as $poke_1) {
        echo "<p>Nummer: " . htmlspecialchars($poke_1['id']) . "</p>";
        echo "<p>Name: " . htmlspecialchars($poke_1['pokename']) . "</p>";
        echo "<p>Typ: " . htmlspecialchars($poke_1['element']) . "</p>";
        echo '<a href="/dexPhp/pokemon/' . htmlspecialchars($poke_1['pokename']) . '/entry">View Pokedex Entry</a>';
        echo "<br>";
       
 
    }
} else {
    echo "<p>Aktuell keine pokemon vorhanden </p>";
}
 echo $counter;
?>

</body>
</html>

