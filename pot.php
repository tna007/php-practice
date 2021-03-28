<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jackpot practice</title>
</head>
<body>
    <?php
        $a = random_int(0,1);
        $b = random_int(0,1);
        $c = random_int(0,1);
        $d = random_int(0,1);
        $e = random_int(0,1);
        $cost = 0.5;
        $count = 0;
        $round = 0;
        $jackpotCount = 0;
        $jackpotWon = 10;

        while ($jackpotCount < $jackpotWon) {
            $jackpotCount++;
            $win = false;
          
            while ($win === false) {
              $round++;
              $array = array();
              echo '<h3>round ' . $round . '</h3>';

                while ($count < 5) {
                  $array[$count] = random_int(0,1);
                  $count++;
                }
                print_r($array);
                echo '<br>';        
            
                $oneCount = 0;
                $zeroCount = 0;
        
                while ($count) {
                    $count--;
        
                    if ($array[$count] === 1) {
                    $oneCount++;
                    } else {
                    $zeroCount++;
                    }
                }   
                echo 'Found ' . $oneCount . ' ones and ' . $zeroCount . ' zeroes <br>';
                

                if ($oneCount === 5) {
                    $win = true;
                    echo 'Jackpot! <hr>';
                    break;
                } else if ($zeroCount === 5) {
                    echo "Congrats but no win <hr>";
                } else if ($oneCount > 3 && $zeroCount < 5) {
                    echo "Small prize <hr>";
                } else {
                    echo "Nothing <hr>";
                }
               
            }
        }

        $expend = $cost * $round;
        
        echo '<h4>' . $round . ' rounds was played til jackpot won </h4>';
        echo '<h4>' . $expend .  ' euro was spent til jackpot </h4>';
        
            
    ?>
</body>
</html>