<?php

// include "../Databases/database.php";

// if(isset($_POST['roles'], $_POST['username'], $_POST['pwd'])){

//     $role = $_POST['roles'];
//     $username  = $_POST['username'];
//     $pwd = $_POST['pwd'];


//     $hash = hash_init("sha1");
//     hash_update($hash, $pwd);
//     $password = hash_final($hash);

//     $sql = "SELECT * FROM `users` WHERE role= '$role' AND username= '$username'";
//     $stmt = $conn->query($sql);

//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     echo $results[0]['password'];

    // if(hash_equals($password, $results[0]['password'])){
    //     session_start();
    //     $_SESSION['login'] = "logged in";
    //     header("Location: ../HTMLFiles/admin-homepage.php");
    //     exit();
    // }else{
    //     // header("Location: ../HTMLFiles/staff-login.php");
    //     // exit();
    // }



   
// }

?>