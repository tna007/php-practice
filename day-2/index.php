<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array method and API</title>
</head>
<body>
    <?php
        $data = file_get_contents('data.json');
        $json = json_decode($data,true);
        $i = 0;
        echo '<h2>Total pokemons: ' . $json['count'] . '</h2>';
        echo '<hr>';
        /**
         * @return 
         */
        foreach($json['results'] as $v1){
            echo '<h3>' . $i . '</h3>' . ' ';
            echo '<pre>';
            print_r($v1['name'] . ' ' . $v1['url'] . '<hr>');
            echo '</pre>';
            $i++;
        }
        $new_arr = array_chunk($json['results'], 50);
        echo '3rd group of 50 pokemons is here: ';
        echo '<pre>';
        print_r($new_arr[2]);
        echo '</pre>';
        echo '<hr>';
        print_r(count($new_arr));
        echo '<hr>';
        $counter = 0;
        while($counter<count($new_arr)){
            $link = "localhost:4000/?page=$counter";
            echo "$link <br>";
            $link = $new_arr[$counter];
            echo '<pre>';
            print_r($link) ;
            echo '</pre>';
            echo '<hr>';
            echo http_build_query($link);
            $counter++;
        }


/*         echo '<pre>';
        print_r($json);
        echo '</pre>'; */
    ?>
</body>
</html>