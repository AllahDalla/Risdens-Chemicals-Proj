<?php

session_start();

if(isset($_SESSION['login'])){
  header("Location: ../HTMLFiles/staff-login.php");
  exit();
}

include "../Databases/database.php";






?>