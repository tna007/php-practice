<?php 
    //header("Access-Control-Allow-Origin: *");

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    
    if (isset($_POST['guestName']) && isset($_POST['email']) && filter_var($_POST['email'])) {
        $subject = $_POST['guestName'] . ' sent you a message';
        $message = wordwrap($message, 70, "\r\n");

        $sent = mail('anh.to@edu.bc.fi', $subject, $message);

        $sent ? 'Message delivered' :'Something went wrong T_T';
    }
?>