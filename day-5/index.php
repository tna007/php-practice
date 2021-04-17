<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Another</title>
    <link rel="stylesheet" href="style.css">
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
    <button class='nav' id='prev'>Previous</button>
    <button class='nav' id='next'>Next</button>
<script>
    <?php
    // create page parameter to add page list 
    isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;    
    ?>
    let currentPage = <?php echo $page ?>;
    getNewPage(currentPage);

    document.getElementById('prev').disabled = true;

    document.querySelectorAll('.nav').forEach(btn => {
            btn.addEventListener('click', (e) => {
                getPageDirection(e.target.id);
            })
    })

    function getPageDirection(direction) {
        if (direction === 'next' && currentPage < (lastPage - 1)) {
            currentPage++;
            getNewPage(currentPage);
            document.getElementById('prev').disabled = false;

            if (currentPage === (lastPage - 1)) {
            document.getElementById('next').disabled = true;
            };

        } else if (direction === 'prev' && currentPage > 0) {
            currentPage--;
            getNewPage(currentPage);
            document.getElementById('next').disabled = false;

            if (currentPage === 0) {
            document.getElementById('prev').disabled = true;
            };
        } 
    }  

    function addPageList(currentPage, totalPage) {
        document.getElementById("pageNumber").innerHTML = '';
		let pagination = document.getElementById("pageNumber");

		// Create an element for each page and add it to pagination
		for (let i = 1; i <= totalPage; i++) {
			let listedPage;
			if (i == currentPage) {
				// If it's the current page, create a span element to contain page number
				listedPage = document.createElement("span");
				listedPage.innerHTML = i;

			} else {
				// Otherwise, create a link to the page number
				listedPage = document.createElement("a");
				listedPage.setAttribute(`href`, `?page=${i}`);
				listedPage.innerHTML = i;
				}
				pagination.appendChild(listedPage);
			}
		};

    function getNewPage(page) {
        document.getElementById("list").innerHTML ='';
        fetch(`formatted_pokemon.php?page=${page}`, {
            method: 'GET',
        })
        .then(resp => resp.json())
        .then(json => {
            lastPage = json[0];
            let pokemons = json[1];
            // pokemons is now type of object
            Object.values(pokemons).forEach(addPoke);

            getPageDirection();

            addPageList(currentPage, lastPage);

            document.querySelectorAll('.pokemon .name').forEach(el => {
                el.addEventListener('click', addPokeImg)
            });
        })
        .catch((err) => console.log(err));
    }

    function addPokeImg(e) {
        fetch(e.target.getAttribute('data-url'))
        .then(resp => resp.json())
        .then(json => {
            console.log(json.sprites.front_default)
            document.getElementById('currentPoke').setAttribute('src', json.sprites.front_default)});
    }

    function addPoke(obj) {
        const pokemon = document.createElement("div");
        pokemon.className = "pokemon";
        pokemon.innerHTML = `<div class='name' data-url='${obj.url}'>${obj.name}</div>`;
        document.getElementById("list").appendChild(pokemon);
    }

</script>
</body>
</html>
