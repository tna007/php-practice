<?php 
    //header("Access-Control-Allow-Origin: *");

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    
    $subject = $_POST['guestName'] . ' sent you a message';
    $message = wordwrap($message, 70, "\r\n");

    $sent = mail('anh.to@edu.bc.fi', $subject, $message);

    if ($sent) {
        echo 'Message delivered';
    } else {
        echo 'Something went wrong T_T';
    }
?>