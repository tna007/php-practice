# [day-1](https://github.com/tna007/php-practice/tree/main/day-1)

**_Finnish number translator 0-1000_**

Print out random number and translate it into Finnish.

**_Simple Jackpot game_**

Rules as follow:

- All five 1s, jackpot!
- All five 0s, congrats! But no win.
- All four 1s, smaller prize.
- Game stop when jackpot won.
- Announce how many rounds have been played to win the jackpot.
- If each round costs 50 cents, run the above program 5 times, calculate how much on average user have to spend to win a jackpot.

# [day-2](https://github.com/tna007/php-practice/tree/main/day-2)

**_Handle Pokemons_**

An exercise practiced with API from https://pokeapi.co/api/v2/pokemon?offset=0&limit=2000. Descriptions as below:

- Create data.json file from API.
- Load the json content and parse it into a readable format for PHP.
- Create an HTML element that notifies the user about how many pokemons are being displayed, this number should come from the json content, not hardcoded.
- Loop through the list of pokemons, and only display the name, and the url of each pokemons.
- Display each pokemon with an index number (0 - 1118)
- Split the array into chunks of 50 pokemons, limit the result to only show the 3rd group of 50 pokemons.
- Allow a page parameter to your PHP application, display the corresponding group of 50 pokemons according to the user query parameter. Such as localhost:5000/?page=15 should display the 15th group of 50 pokemons.

# [day-3](https://github.com/tna007/php-practice/tree/main/day-3)

**_Testing input validator_**

1. `Function validate_username`, takes 1 argument, validate that it is a non empty string, and doesn’t have more than 25 characters

2. `Function validate_weekday`, takes 1 argument, validate that it is an integer within the range of 0 - 6 (0 - Sunday, 1 - Monday, 2 - Tuesday, 3 - Wednesday, 4 - Thursday, 5 - Friday, 6 - Saturday). Return true if all conditions are met, false otherwise

3. `Function validate_withdraw_amount`, takes 2 arguments, validate that both are numerical amounts without decimal point, non negative, and the withdraw amount is less than or equal to the current bank balance amount. Return true if all conditions are met, false otherwise

4. `Function validate_school_email`, takes 1 argument, validate that the input is indeed an email address, and ends with bc.fi. Return true if all conditions are met, false otherwise.

Starter code: https://gist.github.com/bch-fullstack/aaf88469c465d6403b7b8a547154aded

# [day-4](https://github.com/tna007/php-practice/tree/main/day-4)

**_Contact form_**

Connect contact form from personal portfolio to BC server and validate email sent using `$_POST` and `filter_var()` method.

# [day-5](https://github.com/tna007/php-practice/tree/main/day-5)

**_Pokemon list full-stack app_**

Starter code: https://gist.github.com/bch-fullstack/ddebce87fdca00206ca97ec63f2c1000

1. Fetch data from `formatted_pokemon.php` to retrieve the formatted pokemon array in JavaScript.
2. Add(allow) `page` parameter in `formatted_pokemon.php`
3. Chunk the array into chunks of 50 pokemon elements.
4. Validate `page` parameter and only return the corresponding array upon
5. Update UI to lists 50 pokemons at a time with a next and previous button that allow user to fetch the previous or next 50 pokemons, also add buttons with page numbers (_paginiation_) that can fetch a specific group of 50 pokemons according to their index value.
6. Previous and Next button is disabled on first page and last page respectively.

**_Extended version of Pokemon list full-stack app_**

1. Create a form in new_pokemon.php with input fields: id, name, and type of pokemon as a dropdown selector with the following choices https://bulbapedia.bulbagarden.net/wiki/Type

2. Upon submission of the form, a POST request with the form parameters is sent to the same previous PHP file (`formatted_pokemon.php`) that has been developed in the previous version. **Only** add this new Pokemon to the list if id and name is unique, which mean they don't exist in the current array of pokemon.

3. In case the code decides not to save the pokemon, the JSON response should communicate about the reason for failing. Ex: `{ status: 500, message: ‘Error saving new pokemon. Duplication found’ }` In case the code decides to save the pokemon, also communicate that with a status code of 200, and overwrite the existing `data.json` with new content that contains the new pokemon.
