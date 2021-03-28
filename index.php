<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>number counter</title>
</head>
<body>
    <?php
        $counter = 0;
       
        echo '<h1>Number counter</h1>'; 
        echo '<hr>';
        while($counter<100){
            $counter++;
            echo $counter;
            echo '<hr>';
        }
        
    ?>
</body>
</html>