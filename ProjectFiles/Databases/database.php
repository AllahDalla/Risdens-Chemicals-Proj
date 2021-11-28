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



    if(isset($_POST['roles'], $_POST['username'], $_POST['pwd'])){

        $role = $_POST['roles'];
        $username  = $_POST['username'];
        $pwd = $_POST['pwd'];


        $hash = hash_init("sha1");
        hash_update($hash, $pwd);
        $password = hash_final($hash);

        $sql = "SELECT * FROM `users` WHERE role= '$role' AND username= '$username'";
        $stmt = $conn->query($sql);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbpwd = $results[0]['password'];

        if(hash_equals($password, $dbpwd)){
            session_start();
            $_SESSION['login'] = "logged in";
            $_SESSION['username']= $username;
            $_SESSION['role'] = strtoupper($role);
            echo "I have matched perfectly";
            header("Location:../HTMLFiles/admin-homepage.php");
            exit();
        
        }else{
            header("Location:../HTMLFiles/staff-login.php?cred=incorrect");
            exit();
        }    
    }

    
    // CUSTOMER SENDING ORDERS TO BE UPDATED BY DATABASE
    if(isset($_GET['customer-order'], $_POST['cname'], $_POST['caddress'], $_POST['cnumber'], $_POST['ddate'], $_POST['cp_name'], $_POST['cquantity'], $_POST['ctitle'])){
        
        $title = $_POST['ctitle'];
        $customer_name = $_POST['cname'];
        $addr = $_POST['caddress'];
        $tel = $_POST['cnumber'];
        $product_name = $_POST['cp_name'];
        $delivery_date = $_POST['ddate'];
        $quantity = $_POST['cquantity'];



        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `incoming_orders`(title, customer_name, telephone, delivery_address, product_name, quantity, delivery_date, transaction_time)
              VALUES ('$title','$customer_name','$tel', '$addr', '$product_name', '$quantity', '$delivery_date', now())";
      
        $conn->exec($sql);
    }
   
    // echo "This connected!";


    // Testing database retrieval and updating
    // AL-ROMARIO DAVIS' DATABASE RECORD
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



    // RAMONA STANBERRY'S DATABASE RECORD
    // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // $roles = "admin";
    // $username= "<your name here>";
    // $pwd = "<password>";
    // $hash = hash_init("sha1");
    // hash_update($hash, $pwd);
    // $password = hash_final($hash);
    // $sql = "INSERT INTO `users` (role, username, password) 
    //         VALUES ('$roles','$username','$password')";
    // $conn->exec($sql);
    // echo "New record added";


    // DAVASKYE DEBIQUE'S DATABASE RECORD
    // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // $roles = "admin";
    // $username= "<your name here>";
    // $pwd = "<password>";
    // $hash = hash_init("sha1");
    // hash_update($hash, $pwd);
    // $password = hash_final($hash);
    // $sql = "INSERT INTO `users` (role, username, password) 
    //         VALUES ('$roles','$username','$password')";
    // $conn->exec($sql);
    // echo "New record added";



    // DANIEL RICHARDSON'S DATABASE RECORD
    // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // $roles = "admin";
    // $username= "<your name here>";
    // $pwd = "<password>";
    // $hash = hash_init("sha1");
    // hash_update($hash, $pwd);
    // $password = hash_final($hash);
    // $sql = "INSERT INTO `users` (role, username, password) 
    //         VALUES ('$roles','$username','$password')";
    // $conn->exec($sql);
    // echo "New record added";


    // SHEREKA SIMMONDS' DATABASE RECORD
    // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // $roles = "admin";
    // $username= "<your name here>";
    // $pwd = "<password>";
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