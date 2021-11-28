<?php

session_start();

if(isset($_SESSION['login'])){
  header("Location: ../HTMLFiles/staff-login.php");
  exit();
}

$host = 'localhost';
$username = 'risden_admin';
$password = 'R1SD3N2211';
$dbname = 'risdendata';

try {
    $conn = new PDO(
        'mysql:host=' . $host . ';dbname=' . $dbname,
        $username,
        $password
    );

   
    // echo "This connected!";


    // Testing database retrieval and updating

    // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // $roles = "admin";
    // $username= "AllahDalla";
    // $pwd = "password321";
    // $hash = hash_init("sha1");
    // hash_update($hash, $pwd);
    // $password = hash_final($hash);
    // $sql = "INSERT INTO `users` (role, username, password) 
    //         VALUES ('$roles','$username','$password')";
    // $conn->exec($sql);
    // echo "New record added";
    
} catch (PDOException $e) {
    die($e->getMessage());
}


//we can now say $conn->query("SQL GOES HERE") to do things to database.
//use this command on mySQL to allow this php script access to database.

/*GRANT ALL PRIVILEGES ON risdendata.* TO 'risden_admin'@'localhost' 
IDENTIFIED BY 'R1SD3N2211';*/

?>