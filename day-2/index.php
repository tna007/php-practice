<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handle Pokemons</title>
</head>
<body>
    <?php
        $data = file_get_contents('data.json');
        $json = json_decode($data,true);
        $i = 0;
        echo '<h2>Total pokemons: ' . $json['count'] . '</h2>';
        echo '<hr>';

        foreach($json['results'] as $v1){
            echo '<h3>' . $i . '</h3>' . ' ';
            echo '<pre>';
            print_r($v1['name'] . ' ' . $v1['url'] . '<hr>');
            echo '</pre>';
            $i++;
        }

        $new_arr = array_chunk($json['results'], 50, true);
        echo '<h4>3rd group of 50 pokemons</h4>';
        echo '<pre>';
        print_r($new_arr[2]);
        echo '</pre>';
        echo '<hr>';

        $page = $_GET['page'];
        if ($page < count($new_arr)) {
            echo '<h4>this is page ' . $_GET["page"] . ' of 50 Pokemons!</h4><br>';
            echo '<pre>';
            print_r($new_arr[$page]);
            echo '</pre>';         
        } else {
            echo '<h4 style=\'color: red\'>404 ERROR!</h4>';
        }
    ?>
</body>
</html>