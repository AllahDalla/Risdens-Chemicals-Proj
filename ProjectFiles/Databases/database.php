<?php

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
    echo "This connected!";


    // Testing database retrieval and updating

    // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // for($primary_key=10; $primary_key<=100; $primary_key++){
    // $sql = "INSERT INTO `products` VALUES ('$primary_key','Bleach','50', '20000')";
    // $conn->exec($sql);
    // echo "New record added";
    // }
    
} catch (PDOException $e) {
    die($e->getMessage());
}


//we can now say $conn->query("SQL GOES HERE") to do things to database.
//use this command on mySQL to allow this php script access to database.

/*GRANT ALL PRIVILEGES ON risdendata.* TO 'risden_admin'@'localhost' 
IDENTIFIED BY 'R1SD3N2211';*/

?>