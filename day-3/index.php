<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input validation</title>
</head>
<body>
    <?php
        function validate_username($user) {
            $allowed = array('.','_');
           if(ctype_alnum(str_replace($allowed,'', $user)) && (strlen($user)<=25)) {
               return("username is $user");
           } else{
               return('invalid user');
           };
        };

        echo validate_username('tna_007') .'<br>'
        . validate_username('tna.007') . '<br>'
        . validate_username('tna@007') . '<br>'
        . validate_username('') . '<br>'
        . validate_username('tna00777777777777777777777') . '<br>';
        echo '<hr>';

        function validate_weekday($day) {
            $options = array(
                'options' => array(
                    'min_range' => 0,
                    'max_range' => 6,
                )
            );

            if (!is_string($day)) {
                return filter_var($day, FILTER_VALIDATE_INT, $options);
            } else {
                return false;
            };
        };

        echo '0 is a valid weekday: ' . validate_weekday(0) . //true
        '<br>'
        . '6 is a valid weekday: ' . validate_weekday(6) . //true
        '<br>'
        . '100 is a valid weekday: ' . validate_weekday(100) . //false
        '<br>'
        . '-12 is a valid weekday: ' . validate_weekday(-12) . //false
        '<br>'
        . '4 is a valid weekday: ' . validate_weekday(4) . //true
        '<br>'
        . 'null is a valid weekday: ' . validate_weekday(null) . //false
        '<br>'
        . 'An empty string is a valid weekday: ' . validate_weekday('') . //false 
        '<br>'
        . 'A string is a valid weekday: ' . validate_weekday('5') . //false
        '<br>';
        echo '<hr>';

        function validate_widthdraw_amount($amount, $balance) {
            if (is_int($amount)
                && is_int($balance)
                && $amount <= $balance
                && $amount > 0
            ) {
                return true;
            } else {
                return false;
            }
        }

        echo 'Able to withdraw 100 from an account of 1000 balance: ' . validate_widthdraw_amount(100, 1000) . // true
        '<br>' .
        'Able to withdraw 1000 from an account of 1000 balance: ' . validate_widthdraw_amount(1000, 1000) . // true
        '<br>' .
        'Able to withdraw -50 from an account of 1000 balance: ' . validate_widthdraw_amount(-50, 1000) . // false
        '<br>' .
        'Able to withdraw 1500 from an account of 1000 balance: ' . validate_widthdraw_amount(1500, 1000) . // false
        '<br>' .
        'Able to withdraw true from an account of true balance: ' . validate_widthdraw_amount(true, true) . // false
        '<br>' .
        'Able to withdraw 0 from an account of negative 100 balance: ' . validate_widthdraw_amount(0, -100) . // false
        '<br>' .
        'Able to withdraw null from an account of 0 balance: ' . validate_widthdraw_amount(null, 0) . // false
        '<br>';
    ?>
</body>
</html>