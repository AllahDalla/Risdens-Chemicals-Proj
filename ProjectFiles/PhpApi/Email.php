<?php

session_start();

if(isset($_SESSION['login'])){
  
}else{
    // echo "Incorrect credentials";
    header("Location: ../HTMLFiles/staff-login.php");
    exit();
}

include "../Databases/database.php";



if(isset($_GET['email'], $_POST['email'], $_POST['payment'], $_POST['id'])){
    if($_GET['email'] == "send-mail"){

        $to = $_POST['email'];
        $subject = "This is a test PHP email";
        $txt = "Hello world!";
        $headers = "From: alromariodavis@gmail.com" . "\r\n" .
                    "CC: somebodyelse@example.com";
        // mail($to,$subject,$txt,$headers);
        echo "THIS FUNCTION HAS NOT BEEN IMPLEMENTED YET";

    }
}



?>