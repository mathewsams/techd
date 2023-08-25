<?php
    /**
     * ENQUIRY PROCESS
     */

    if(!isset($_POST['email']) || (trim($_POST['email']) == "") && !(filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL))) {
        header("Location: index.php");
        exit();
    }

    $subject = "Techdroid | Web Form Enquiry - " . $_POST['email'];

    $message = "<p>Dear Techdroid,</p><br>";

    $message .= "<p>".$_POST['message']."</p><br>";

    $message .= "<p>Name: ".$_POST['name']."</p>";
    $message .= "<p>Email: ".$_POST['email']."</p>";
    $message .= "<p>Contact: ".$_POST['contact']."</p>";
    $message .= "<p>Service: ".$_POST['service']."</p>";

    $header = "From:".$_POST['email']." \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail ("hello@techdroid.ca",$subject,$message,$header);

    if( $retval == true ) {
        header("Location: index.php?email=send");
        exit();
    } else {
        header("Location: 404.html");
        exit();
    }

?>