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
} catch (Exception $e) {
    die($e->getMessage());
}


//we can now say $conn->query("SQL GOES HERE") to do things to database.
//use this command on mySQL to allow this php script access to database.

/*GRANT ALL PRIVILEGES ON risdendata.* TO 'risden_admin'@'localhost' 
IDENTIFIED BY 'R1SD3N2211';*/

?>