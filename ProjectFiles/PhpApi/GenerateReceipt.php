<?php

session_start();

if(isset($_SESSION['login'])){
  
}else{
    // echo "Incorrect credentials";
    header("Location: ../HTMLFiles/staff-login.php");
    exit();
}

include "../Databases/database.php";



if(isset($_GET['receipt'], $_POST['payment'], $_POST['id'])){
    if($_GET['receipt'] == "customer-receipt"){
        $id = (int)$_POST['id'];

        $stmt= $conn->query("SELECT * FROM `transactions` WHERE id='$id'");

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($results as $rows){
            $customer_name = $rows['customer_name'];
            $title = $rows['title'];
            $price = $rows['price'];
            $discount = $rows['discount'];
            $transaction_time = $rows['transaction_time'];
            $delivery_date = $rows['delivery_date'];
            $quantity = $rows['quantity'];
            $product_name = $rows['product_name'];

        }
        $discount_payment = number_format(((float)$price/100)*(float)$discount,2);
        // echo $discount_payment;
        $payment = number_format((float)$_POST['payment'], 2);
        $real_price = number_format((float)$price - (float)$discount_payment, 2);
        $change = number_format((float)$payment-(float)$real_price, 2);
        // echo "real price ".$real_price;
        // echo "change\n".$change;
        // echo "payment :".$payment;
        // echo "calc :".$payment-$real_price;
        // echo "What is in payment :$payment and what is in real-price :$real_price and when you calculate, why ".$payment-$real_price;
        
        $file = fopen("../Receipts/$customer_name".".txt", "w") or die("Unable to open file");
        $text = "ORDER ID NUMBER : .................... ".$id."\n";
        fwrite($file, $text);
        $text = "CUSTOMER NAME : $title".$customer_name."\n";
        fwrite($file, $text);
        $text = "PRODUCT NAME : ".$product_name."\n";
        fwrite($file, $text);
        $text = "QUANTITY OF PRODUCT : ".$quantity." gallons\n";
        fwrite($file, $text);
        $text = "PRICE CHARGED : $".$price."\n";
        fwrite($file, $text);
        $text = "DISCOUNT : ".$discount."%\n";
        fwrite($file, $text);
        $text = "PAYMENT : $".$payment."\n";
        fwrite($file, $text);
        $text = "CHANGE : $".$change."\n";
        fwrite($file, $text);
        $text = "DELIVERY DATE : ".$delivery_date."\n";
        fwrite($file, $text);
        $text = "TRANSACTION TIME : ...................... ".date("F - d - Y - h:i:s")."\n";
        fwrite($file, $text);
        fclose($file);

        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE `transactions` SET `payment`='$payment', `change`='$change'
                WHERE `id`='$id'";
      
        $conn->exec($sql);

        header("Location:../HTMLFiles/admin-homepage.php");
        exit();
       
    }
}