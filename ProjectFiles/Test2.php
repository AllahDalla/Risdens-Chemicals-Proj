<?php

include "../ProjectFiles/Databases/database.php";
    $role = "admin";
    $username  = "AllahDalla";
    $pwd = "password321";


    $hash = hash_init("sha1");
    hash_update($hash, $pwd);
    $password = hash_final($hash);

    $sql = "SELECT * FROM `users` WHERE role= '$role' AND username= '$username'";
    $stmt = $conn->query($sql);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $results[0]['password'];

?>