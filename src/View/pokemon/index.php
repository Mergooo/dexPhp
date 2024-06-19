
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon List</title>

</head>
<body>
<?php
$counter = 0;
 $entry = null;
    if (isset($_GET['name'])) {
        
        $pokemonName = htmlspecialchars($_GET['name']);
        // エントリ生成スクリプトを絶対パスで読み込む
        ob_start();
        include 'C:/xampp/htdocs/dexPhp/src/Services/generatePokedexEntry.php';
        $entry = ob_get_clean();
        $counter++;
        echo $counter;
    }
if (is_array($pokemon)) {
    foreach ($pokemon as $poke_1) {
        echo "<p>Nummer: " . htmlspecialchars($poke_1['id']) . "</p>";
        echo "<p>Name: " . htmlspecialchars($poke_1['pokename']) . "</p>";
        echo "<p>Typ: " . htmlspecialchars($poke_1['element']) . "</p>";?>

<form action="" method="GET">
                <input type="hidden" name="name" value="<?= htmlspecialchars($poke_1['pokename']) ?>">
                <button type="submit">Get Pokedex Entry</button>
            </form>
            <?php
            if (isset($pokemonName) && $pokemonName === $poke_1['pokename']): ?>
                <p><?= htmlspecialchars($entry) ?></p>
            <?php endif; ?>


        <?php
        echo "<br>";
    }
} else {
    echo "<p>Aktuell keine pokemon vorhanden </p>";
}
 echo $counter;
?>

</body>
</html>

