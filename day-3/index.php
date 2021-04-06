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
           if((strlen($user)<=25) && ctype_alnum(str_replace($allowed,'', $user))) {
               echo "username is $user";
           } else{
               echo 'invalid user';
           };
        };
        echo validate_username('tna_007') .'<br>';
        echo validate_username('tna.007') . '<br>';
        echo validate_username('tna@007') . '<br>';
        echo validate_username('tna00777777777777777777777') . '<br>';
    ?>
</body>
</html>