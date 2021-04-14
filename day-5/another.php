<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Another</title>

    <style>

</style>
</head>
<body>
    <h1>Pokedex</h1>
 <div>
  <img src="https://i.gifer.com/WiCJ.gif" alt='via gifer'/> 
    <img id='currentPoke' src=''>
 </div>
    <main id='list'>
    </main>
    <img src="https://i.gifer.com/WiCJ.gif" alt='via gifer'/> 
    <button id='prev'>Previous</button>
    <button id='next'>Next</button>
<script>
    let newPage = 0;
            
    document.getElementById('prev').style.visibility='hidden';

    document.getElementById('next').addEventListener('click', (e) => {
        if (newPage <23) {
            newPage++;
            let pokeURL = `formatted_pokemon.php?page=${newPage}`;
            console.log(pokeURL);
            getNewPage(newPage);
        } else {
            document.getElementById('next').style.visibility='hidden';
        };

        if (newPage >1) {
            document.getElementById('prev').style.visibility='visible';
        }
    });

    document.getElementById('prev').addEventListener('click', (e) => {
        newPage--;
        let pokeURL = `formatted_pokemon.php?page=${newPage}`;
        console.log(pokeURL);
        getNewPage(newPage);

        if (newPage == 1) {
            document.getElementById('prev').style.visibility='hidden';
        }
    });

    async function getNewPage(page) {
        let resp = await fetch(`formatted_pokemon.php?page=${page}`);
        let json = await resp.json();
        console.log(json);
        json.forEach(addPoke);

        document.querySelectorAll('.pokemon .name').forEach(el => {
            el.addEventListener('click', async (e) => {
                let resp = await fetch(e.target.getAttribute('data-url'));
                console.log(resp);
                let json = await resp.json();
                console.log(json);

                console.log(json.sprites.front_default);
                document.getElementById('currentPoke').setAttribute('src', json.sprites.front_default);
            })
        })
    }

    function addPoke(obj) {
        const pokemon = document.createElement("div");
        pokemon.className = "pokemon";
        pokemon.innerHTML = `<div class='name' data-url='${obj.url}'>${obj.name}</div>`;
        document.getElementById("list").appendChild(pokemon);
    };

</script>
</body>
</html>
