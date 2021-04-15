<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Another</title>

    <style>
    @import url(https://fonts.googleapis.com/css?family=RocknRoll+One:regular);

body {
    background-color: powderblue;
    text-align: center;
    color: honeydew;
    font-family: 'RocknRoll One';
}
h1 {
    font-size: 2.5em;
    color: crimson;
}
.name {
    margin: 1em auto;
}
.name:hover{
    color: #333;
    cursor: pointer;
}
.page {
    display: flex;
    flex-wrap: wrap row;
}
ul li{
    list-style: none;
    display: inline-block;
    padding: 1em;
}
button {
    cursor: pointer;
    margin: 2em;
    padding: 0.5em;
    font-family: 'RocknRoll One';
}
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
    <div class='page'>
    <ul id='pageNumber'></ul>
    </div>
    <button id='prev'>Previous</button>
    <button id='next'>Next</button>
<script>
<?php
isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;
?>
    let currentPage = <?php echo $page ?>;
    console.log(currentPage, typeof currentPage);
    
    document.getElementById('prev').style.visibility='hidden';

    document.getElementById('next').addEventListener('click', (e) => {
        if (currentPage <23) {
            currentPage++;
            let pokeURL = `formatted_pokemon.php?page=${currentPage}`;
            console.log(pokeURL, currentPage);
            getNewPage(currentPage);
            let pageNumb = document.createElement('li');
            pageNumb.innerHTML = `<li><a href='formatted_pokemon.php?page=${currentPage}'>${currentPage}</a></li>`;
            document.getElementById('pageNumber').appendChild(pageNumb);
        } else {
            document.getElementById('next').style.visibility='hidden';
        };

        if (currentPage >1) {
            document.getElementById('prev').style.visibility='visible';
        }
    });

    document.getElementById('prev').addEventListener('click', (e) => {
        currentPage--;
        let pokeURL = `formatted_pokemon.php?page=${currentPage}`;
        console.log(pokeURL);
        getNewPage(currentPage);

        if (currentPage == 1) {
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
        pokemon.innerHTML = `<div class='name' data-url='${obj.url}'>${obj.name}</div><hr>`;
        document.getElementById("list").appendChild(pokemon);
    };

</script>
</body>
</html>
