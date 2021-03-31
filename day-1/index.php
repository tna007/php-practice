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
        echo '<h1>Finnish number translator</h1> <br>'; 

        $result = '';
        $counter = random_int(0,1000);
        echo $counter;
        echo '<hr>';
        if ($counter >= 0 && $counter <=10) {
            switch($counter) {
                case 0:
                    $result = 'nolla';
                    break;
                case 1:
                    $result = 'yksi';
                    break;
                case 2:
                    $result = 'kaksi';
                    break;
                case 3:
                    $result = 'kolme';
                    break;
                case 4:
                    $result = 'neljä';
                    break;
                case 5:
                    $result = 'viisi';
                    break;
                case 6:
                    $result = 'kuusi';
                    break;
                case 7:
                    $result = 'seitsemän';
                    break;
                case 8:
                    $result = 'kahdeksän';
                    break;
                case 9:
                    $result = 'yhdeksän';
                    break;
                case 10:
                    $result = 'kymmenen';
                    break;
                default:
                    break;
            }
        } elseif ($counter>10 && $counter<=19) {
            $remainder = $counter - 10;
            switch($remainder) {
                case 1:
                    $result .= 'yksi';
                    break;
                case 2:
                    $result .= 'kaksi';
                    break;
                case 3:
                    $result .= 'kolme';
                    break;
                case 4:
                    $result .= 'neljä';
                    break;
                case 5:
                    $result .= 'viisi';
                    break;
                case 6:
                    $result .= 'kuusi';
                    break;
                case 7:
                    $result .= 'seitsemän';
                    break;
                case 8:
                    $result .= 'kahdeksän';
                    break;
                case 9:
                    $result .= 'yhdeksän';
                    break;
                default:
                break;
            }
            $result = $result .='toista';
        } elseif($counter>20 && $counter<=99) {
            $module = intdiv($counter,10); //return integer quotient of the division
            $remainder = fmod($counter,10); //return remainder of the division
            switch($module) {
                case 2:
                    $result .= 'kaksi';
                    break;
                case 3:
                    $result .= 'kolme';
                    break;
                case 4:
                    $result .= 'neljä';
                    break;
                case 5:
                    $result .= 'viisi';
                    break;
                case 6:
                    $result .= 'kuusi';
                    break;
                case 7:
                    $result .= 'seitsemän';
                    break;
                case 8:
                    $result .= 'kahdeksän';
                    break;
                case 9:
                    $result .= 'yhdeksän';
                    break;
                default:
                break;
            }
            $result= $result .='kymmentä';

            switch($remainder) {
                case 1:
                    $result .= 'yksi';
                    break;
                case 2:
                    $result .= 'kaksi';
                    break;
                case 3:
                    $result .= 'kolme';
                    break;
                case 4:
                    $result .= 'neljä';
                    break;
                case 5:
                    $result .= 'viisi';
                    break;
                case 6:
                    $result .= 'kuusi';
                    break;
                case 7:
                    $result .= 'seitsemän';
                    break;
                case 8:
                    $result .= 'kahdeksän';
                    break;
                case 9:
                    $result .= 'yhdeksän';
                    break;
                default:
                break;
            }
        }elseif($counter == 100){
            $result = 'sata';
        }elseif($counter > 100 && $counter <= 1000) {
            $module= intdiv($counter,100);
            $remainder = intdiv(fmod($counter,100),10);
            $remainder2 = fmod(fmod($counter,100),10);
            
            switch($module){
                case 1:
                    $result .= 'yksi';
                    break;
                case 2:
                    $result .= 'kaksi';
                    break;
                case 3:
                    $result .= 'kolme';
                    break;
                case 4:
                    $result .= 'neljä';
                    break;
                case 5:
                    $result .= 'viisi';
                    break;
                case 6:
                    $result .= 'kuusi';
                    break;
                case 7:
                    $result .= 'seitsemän';
                    break;
                case 8:
                    $result .= 'kahdeksän';
                    break;
                case 9:
                    $result .= 'yhdeksän';
                    break;
                default:
                break;
            }
            $result= $result .='sataa';

            switch($remainder) {
                case 1:
                    $result .='yksi';
                    break;
                case 2:
                    $result .='kaksi';
                    break;
                case 3:
                    $result .='kolme';
                    break;
                case 4:
                    $result .='neljä';
                    break;
                case 5:
                    $result .='viisi';
                    break;
                case 6:
                    $result .='kuusi';
                    break;
                case 7:
                    $result .='seitsemän';
                    break;
                case 8:
                    $result .='kahdeksän';
                    break;
                case 9:
                    $result .='yhdeksän';
                    break;
                default:
                break;
            }
            
            if ($remainder!=0) {
                $result= $result .='kymmentä';
            } else {
                $result = $result;
            }

            switch($remainder2) {
                case 1:
                    $result .= 'yksi';
                    break;
                case 2:
                    $result .= 'kaksi';
                    break;
                case 3:
                    $result .= 'kolme';
                    break;
                case 4:
                    $result .= 'neljä';
                    break;
                case 5:
                    $result .= 'viisi';
                    break;
                case 6:
                    $result .= 'kuusi';
                    break;
                case 7:
                    $result .= 'seitsemän';
                    break;
                case 8:
                    $result .= 'kahdeksän';
                    break;
                case 9:
                    $result .= 'yhdeksän';
                    break;
                default:
                break;
            }
        } else {
            $result = 'tuhat';
        }
        echo $result;
    ?>
</body>
</html>