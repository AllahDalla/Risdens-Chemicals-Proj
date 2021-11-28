<?php

session_start();

if(isset($_SESSION['login'])){
  
}else{
    // echo "Incorrect credentials";
    header("Location: ../HTMLFiles/staff-login.php");
    exit();
}

include "../Databases/database.php";






?>