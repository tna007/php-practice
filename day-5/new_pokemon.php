<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New pokemon</title>
</head>
<body>
    <h1>Pokemon form</h1>
    <main>
        <form method='POST' action="formatted_pokemon.php">
        <label for="id">ID</label>
        <input type="text" id='id' name='id'>
        
        <label for="name">Name</label>
        <input type="text" id='name' name='name'>

        <label for="type">Choose type</label>
        <select name="type" id="type">
            <option value="normal">Normal</option>
            <option value="fighting">Fighting</option>
            <option value="poisionous">Poision</option>
            <option value="flying">Flying</option>
            <option value="fire">Fire</option>
            <option value="water">Water</option>
            <option value="psychic">Psychic</option>
            <option value="ground">Ground</option>
            <option value="rock">Rock</option>
            <option value="ghost">Ghost</option>
        </select>

        <button type='submit'>Submit</button>
        </form>
    </main>
</body>
</html>