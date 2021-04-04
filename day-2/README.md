# [handle-pokemons](https://github.com/tna007/php-practice/blob/main/day-2/index.php)

An exercise practiced with API from https://pokeapi.co/api/v2/pokemon?offset=0&limit=2000. Description as below:

1. Create data.json file from API
2. Load the json content and parse it into a readable format for PHP
3. Create an HTML element that notifies the user about how many pokemons are being displayed, this number should come from the json content, not hardcoded
4. Loop through the list of pokemons, and only display the name, and the url of each pokemons
5. Display each pokemon with an index number (0 - 1118)
6. Split the array into chunks of **50 pokemons**, limit the result to **only show the 3rd group** of 50 pokemons
7. Allow a page parameter to your PHP application, display the corresponding group of 50 pokemons according to the user query parameter. Such as `localhost:5000/?page=15` should display the 15th group of 50 pokemons.
