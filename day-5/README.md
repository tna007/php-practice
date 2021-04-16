# Pokemon list full-stack app

Starter code: https://gist.github.com/bch-fullstack/ddebce87fdca00206ca97ec63f2c1000

1. Fetch data from `formatted_pokemon.php` to retrieve the formatted pokemon array in JavaScript.
2. Add(allow) `page` parameter in `formatted_pokemon.php`
3. Chunk the array into chunks of 50 pokemon elements.
4. Validate `page` parameter and only return the corresponding array upon
5. Update UI to lists 50 pokemons at a time with a next and previous button that allow user to fetch the previous or next 50 pokemons, also add buttons with page numbers (_paginiation_) that can fetch a specific group of 50 pokemons according to their index value.
6. Previous and Next button is disabled on first page and last page respectively.

**_Extended version of Pokemon list full-stack app_**

1. Create a form in `new_pokemon.php` with input fields: id, name, and type of pokemon as a dropdown selector with the following choices https://bulbapedia.bulbagarden.net/wiki/Type

2. Upon submission of the form, a POST request with the form parameters is sent to the same previous PHP file (`formatted_pokemon.php`) that has been developed in the previous version. **Only** add this new Pokemon to the list if id and name is unique, which mean they don't exist in the current array of pokemon.

3. In case the code decides not to save the pokemon, the JSON response should communicate about the reason for failing. Ex: `{ status: 500, message: ‘Error saving new pokemon. Duplication found’ }` In case the code decides to save the pokemon, also communicate that with a status code of 200, and overwrite the existing `data.json` with new content that contains the new pokemon.
