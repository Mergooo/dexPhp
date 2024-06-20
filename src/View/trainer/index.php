<?php
echo "trainer - index page";

if (is_array($trainer)) {
    foreach ($trainer as $trainee1) {
        echo "<p>Nummer: " . htmlspecialchars($trainee1['trainer_id']) . "</p>";
        echo "<p>Trainer Name: " . htmlspecialchars($trainee1['trainer_name']) . "</p>";
        echo "<p>Starterpokemon: " . htmlspecialchars($trainee1['pokemon_name']) . "</p>";
        ?>
        <a href="/dexPhp/trainer/<?= htmlspecialchars($trainee1['trainer_id']) ?>/edit">Edit</a>
        <form action="/dexPhp/trainer/<?= htmlspecialchars($trainee1['trainer_id']) ?>/delete" method="POST" style="display:inline;">
            <button type="submit">Delete</button>
        </form>
        <?php
        echo "<br>";
    }
} else {
    echo "<p>No trainers available.</p>";
}
