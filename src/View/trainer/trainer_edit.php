<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trainer</title>
</head>
<body>
    <h1>Edit Trainer</h1>
    <form action="/dexPhp/trainer/<?= htmlspecialchars($trainer['id']) ?>/update" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($trainer['name']) ?>" required>
        <br>
        <label for="pokemon_id">Pokemon ID:</label>
        <input type="number" id="pokemon_id" name="pokemon_id" value="<?= htmlspecialchars($trainer['pokemon_id']) ?>" required>
        <br>
        <button type="submit">Update Trainer</button>
    </form>
    <a href="/dexPhp/trainer">Back to trainers list</a>
</body>
</html>
