<?php

include "../ProjectFiles/Databases/database.php";
    $role = $_POST['roles'];
    $username  = $_POST['username'];
    $pwd = $_POST['pwd'];


    $hash = hash_init("sha1");
    hash_update($hash, $pwd);
    $password = hash_final($hash);

    $sql = "SELECT * FROM `users` WHERE role= '$role' AND username= '$username'";
    $stmt = $conn->query($sql);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $results[0]['password'];
    ?>
    <br/>
    <?php
    echo "\n".$password;
    ?>
    <br/>
    <?php
    echo hash_equals($password, $results[0]['password']);
    ?>
    <br/>
    <?php
    echo hash_equals($password, $results[0]['password']);
    if (hash_equals($password, $results[0]['password'])){
        ?>
        <br/>
        <?php
        echo "They are the same";
    }else{
        ?>
        <br/>
        <?php
        echo "They are not the same";
    }

?>