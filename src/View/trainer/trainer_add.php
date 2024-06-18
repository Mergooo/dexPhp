<!DOCTYPE html>
<html>
<head>
    <title>Add Trainer</title>
</head>
<body>
    <h1>Add Trainer</h1>
    <form action="/dexPhp/trainer/add" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="pokemon_id">Pokemon ID:</label>
        <input type="number" id="pokemon_id" name="pokemon_id" required>
        <br>
        <button type="submit">Add Trainer</button>
    </form>
    <a href="/dexPhp/trainer">Back to trainers list</a>
</body>
</html>
