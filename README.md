# [day-1](https://github.com/tna007/php-practice/tree/main/day-1)

**_Finish number translator 0-1000_**

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
