<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer List</title>
</head>
<body>
    <h1>Trainer List</h1>
    {% for trainer in trainer %}
        <p>Nummer: {{ trainer.trainer_id }}</p>
        <p>Trainer Name: {{ trainer.trainer_name }}</p>
        <p>Starterpokemon: {{ trainer.pokemon_name }}</p>
        <a href="/dexPhp/trainer/{{ trainer.trainer_id }}/edit">Edit</a>
        <form action="/dexPhp/trainer/{{ trainer.trainer_id }}/delete" method="POST" style="display:inline;">
            <button type="submit">Delete</button>
        </form>
        <br>
    {% else %}
        <p>No trainers available.</p>
    {% endfor %}
</body>
</html>
