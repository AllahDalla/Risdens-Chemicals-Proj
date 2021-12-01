<?php 
include '../Databases/database.php';

session_start();

if(isset($_SESSION['login'])){
  // echo $_SESSION['login'];
}else{
  // echo "Incorrect credentials";
  header("Location: ../HTMLFiles/staff-login.php");
  exit();
}

//php goes here friends.

//THIS PHP DOCUMENT IS USED TO BRING UP THE SIDEBAR PAGES ONLY: EXAMPLE, WHEN MANAGE STOCK BUTTON
// IS CLICKED, THE MANAGE STOCK PAGE ON THE RIGHT-HAND SIDE WILL APPEAR. ALL OTHER FUNCTIONALITIES
// ARE TO BE DONE IN ANOTHER FILE FOR ORGANIZATION




if(isset($_GET['page'])){
  
$pageinfo = $_GET['page'];

if($pageinfo == "managestock"){ //checks to see which page is being requested to be displayed. This is how the pages will be requested from the sidebar buttons

    $stmt= $conn->query("SELECT * FROM `products`");

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    ?>

    <!-- HTML for main area of manage stock starts here -->

    <div id="main-info">
      <h1>RISDEN'S CHEMICALS STOCK DATABASE</h1>
      <div id="scrollable-table">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Supplier</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($results as $row):?>
            <tr>
              <td><?=$row['id'];?></td>
              <td><?=$row['supplier'];?></td>
              <td><?=$row['product_name'];?></td>
              <td><?=$row['quantity']."Gallons";?></td>
              <td><?="$".$row['price'];?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <div class="stock-btn">
        <button id="add-stock-btn" class="btn-1">ADD STOCK</button>
        <button id="update-stock-btn" class="btn-1">UPDATE STOCK</button>
        <button id="view-log-btn" class="btn-1">VIEW LOGS</button>
      </div>
      <!-- This is where the things will come up when each button is clicked -->
      <div id="result-area"></div>
    </div>

<?php
}else if($pageinfo == "manageorder"){

  $stmt= $conn->query("SELECT * FROM `products`");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
  <div id="main-info">
      <h1>RISDEN'S CHEMICALS ORDER MANAGER</h1>
      <div id="scrollable-table">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Supplier</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($results as $row):?>
            <tr>
              <td><?=$row['id'];?></td>
              <td><?=$row['supplier'];?></td>
              <td><?=$row['product_name'];?></td>
              <td><?=$row['quantity']."Gallons";?></td>
              <td><?="$".$row['price'];?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      <div class="stock-btn">
        <button id="place-order-btn" class="btn-1">PLACE ORDER</button>
        <button id="generate-receipt-btn" class="btn-1">GENERATE RECEIPT</button>
        <button id="view-schedule-btn" class="btn-1">VIEW SCHEDULE</button>
      </div>
      <!-- This is where the things will come up when each button is clicked -->
      <div id="result-area"></div>
    </div>

<?php
}else if($pageinfo == "financialreport"){
    // echo "Page is suppose to show here too. When we get it right, it shall be added in God's grace";
    $stmt = $conn->query("SELECT * FROM `transactions`
                            WHERE id= '4080'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h1>RISDEN'S CHEMICALS FINANCIAL REPORT</h1>
    <div id="scrollable-table">
      <table>
        <thead>
          <tr >
            <th>Customer Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Payment</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($results as $row):?>
          <tr>
           
            <td><?=$row['customer_name'];?></td>
            <td><?=$row['product_name'];?></td>
            <td><?=$row['quantity'];?></td>
            <td><?="$".$row['price'];?></td>
            <td><?=$row['payment']?></td>
          </tr> 
          <?php endforeach;?>
          <tr id="whiterow">
            <td>.</td>
            <td >.</td>
            <td>.</td>
            <td>.</td>
            <td>.</td>
          </tr>

          <tr>  
            <td class="separate-table"><b>Total Sales</b></td>
            <td class="separate-table"></td>
            <td class="separate-table"></td>
            <td class="separate-table"></td>
            <td class="separate-table"><b>50000</b></td>
          </tr>
          <tr>  
            <td><b>Total Expenditure</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>50000</b></td>  
          </tr>
          <tr>  
            <td><b>Profit/Loss</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>20%</b></td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php
    
    // total sales, expenses, profit/loss
    
}else if($pageinfo == "settings"){
  // echo "This is the page to add new users, passwords, change anything in the database etc page.";
  ?>

<div id="main-info">
  <h1> Risden's Chemicals Settings</h1>
  <br>
  <h2>Create New User</h2>
  <div id="new-user-form">
    <form action="../Databases/database.php?user=new-user" method="post">
      <div id="input-fields">
        <label for="role">Role</label>
        <input type="settings-text" id="product-name" name="role" />
        <label for="user_name">Username</label>
        <input type="settings-text" id="quantity" name="user_name" />
        <label for="password">Password</label>
        <input type="settings-text" id="price" name="password" />
      </div>  
        <input type="submit" id="user-submit-btn" value="Submit" />
    </form>
  </div>
  <br>
  <br>
  <h2>Client Info</h2>
  <div id="client-info-form">
    <form action="../Databases/database.php?email=client-email" method="post">
      <div id="input-fields">
        <label for="client_email">Email</label>
        <input type="settings-text" id="c_email" name="client_email" />
        <label for="client_password">Password</label>
        <input type="settings-text" id="c_pwd" name="client_password" />
      </div>
        <input type="submit" id="user-submit-btn" value="Submit" />
    </form>
  </div>
  <br>
  <br>
  <h2>Tax Info</h2>
  <div id="tax-form">
    <form action="../Databases/database.php?tax=GCT" method="post">
      <div id="input-fields">
        <label for="tax">G.C.T</label>
        <input type="settings-text" id="tax" name="tax" />
      </div>
        <input type="submit" id="user-submit-btn" value="Submit" />
    </form>
  </div>
  <br>
  <br>



<?php

}
}


  if (isset($_GET['insert'], $_POST['supplier'],$_POST['product-name'], $_POST['quantity'], $_POST['price'] ) || isset($_POST['id'])){
    
    $button = $_GET['insert'];

    if($button == "submit-add"){
      $supplier = $_POST['supplier'];
      $product_name = $_POST['product-name'];
      $quantity = $_POST['quantity'];
      $price = $_POST['price'];

      $checker = $conn->query("SELECT * FROM `products` WHERE supplier= '$supplier' AND product_name= '$product_name'");
      if (count($checker->fetchAll(PDO::FETCH_ASSOC)) == 0){

        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `products`(supplier, product_name, quantity, price)
                VALUES ('$supplier','$product_name','$quantity', '$price')";
        
        $conn->exec($sql);

        $stmt= $conn->query("SELECT id FROM `products` WHERE supplier= '$supplier' AND product_name= '$product_name' AND quantity= '$quantity' AND price = '$price'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id =  $results[0]['id'];

        $update_tracker_sql = "INSERT INTO `logs`(product_id, changed_supplier, changed_product_name, changed_quantity, changed_price, operation, log_time)
        VALUES ('$id','$supplier','$product_name','$quantity', '$price', 'Added', now())";

        $conn->exec($update_tracker_sql);
        echo "New record added!";
        header("Location: ../HTMLFiles/admin-homepage.php");
        exit();
      }else{

        header("Location: ../HTMLFiles/admin-homepage.php");
        exit();
      }
      

      
    }else if ($button == "submit-update"){

      $id = $_POST['id'];
      $supplier = $_POST['supplier'];
      $product_name = $_POST['product-name'];
      $quantity = $_POST['quantity'];
      $price = $_POST['price'];

      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE `products`SET supplier='$supplier', product_name='$product_name', quantity='$quantity', price='$price'
              WHERE id=$id";
      
      $update_tracker_sql = "INSERT INTO `logs`(product_id, changed_supplier, changed_product_name, changed_quantity, changed_price, operation, log_time)
      VALUES ('$id','$supplier','$product_name','$quantity', '$price', 'Updated', now())";
      
      $conn->exec($sql);

      $conn->exec($update_tracker_sql);
      echo "New record updated";
      header("Location: ../HTMLFiles/admin-homepage.php");
      exit();

    }
  }
 
  if(isset($_GET['insert'],$_POST['title'], $_POST['customer-name'], $_POST['tele'], $_POST['address'], $_POST['product-name'], $_POST['quantity'], $_POST['price'], $_POST['discount'])){
    $button = $_GET['insert'];
  
    if($button == "submit-place-order"){
      $title = $_POST['title'];
      $customer_name = $_POST['customer-name'];
      $tele = $_POST['tele'];
      $addr = $_POST['address'];
      $product_name = $_POST['product-name'];
      $quantity = $_POST['quantity'];
      $price = $_POST['price'];
      $discount = $_POST['discount'];
      $delivery = $_POST['delivery'];

  
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO `transactions`(title, customer_name, telephone, delivery_address, product_name, quantity, price , discount, delivery_date, transaction_time)  
              VALUES ('$title','$customer_name', '$tele', '$addr', '$product_name', '$quantity', '$price', '$discount', '$delivery', now())";
      $conn->exec($sql);
      echo "New record updated";

      $stmt= $conn->query("SELECT id FROM `transactions` WHERE title= '$title' AND customer_name= '$customer_name' AND delivery_address= '$addr' AND telephone= '$tele' AND product_name= '$product_name' AND price= '$price'");

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $id_search =  $results[0]['id'];
      $oder_number = $id_search."000";
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE `transactions` SET order_number= '$oder_number'
              WHERE id= '$id_search'";

      $conn->exec($sql);
      if (isset($_GET['redirect'])){
        echo "2";
      }
      
      header("Location: ../HTMLFiles/admin-homepage.php");
      exit();


    }
  }

  if (isset($_GET['schedule'])){
    $date = $_POST['date'];
    setcookie("schedule","$date", time()+ 10);
    header("Location: ../HTMLFiles/admin-homepage.php");
    exit();
    


  }
  if(isset($_GET['getschedule'])){
    if(isset($_COOKIE['schedule'])){
    $date = $_COOKIE['schedule'];
  
    $stmt = $conn->query("SELECT * FROM `transactions`
                            WHERE delivery_date= '$date'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <h1>RISDEN'S CHEMICALS SCHEDULE</h1>
    <h2 id="h2"><?= scheduler($date);?></h2>
    <div id="scrollable-table">
      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Customer</th>
            <th>Telephone #</th>
            <th>Delivery Address</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Delivery Date</th>
            <th>Transaction Time</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($results as $row):?>
          <tr>
            <td><?=$row['title'];?></td>
            <td><?=$row['customer_name'];?></td>
            <td><?=$row['telephone'];?></td>
            <td><?=$row['delivery_address'];?></td>
            <td><?=$row['product_name'];?></td>
            <td><?=$row['quantity'];?></td>
            <td><?="$".$row['price'];?></td>
            <td><?=$row['delivery_date']?></td>
            <td><?=$row['transaction_time']?></td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
    <?php
    }
  }

function scheduler($date){
  $picker = explode("-", strval($date));

  if((int)$picker[1] == 1){
    return "January Day ".$picker[2];
  }else if((int)$picker[1] == 2){
    return "February Day ".$picker[2];
  }else if((int)$picker[1] == 3){
    return "March Day ".$picker[2];
  }else if((int)$picker[1] == 4){
    return "April Day ".$picker[2];
  }else if((int)$picker[1] == 5){
    return "May Day ".$picker[2];
  }else if((int)$picker[1] == 6){
    return "June Day ".$picker[2];
  }else if((int)$picker[1] == 7){
    return "July Day ".$picker[2];
  }else if((int)$picker[1] == 8){
    return "August Day ".$picker[2];
  }else if((int)$picker[1] == 9){
    return "September Day ".$picker[2];
  }else if((int)$picker[1] == 10){
    return "October Day ".$picker[2];
  }else if((int)$picker[1] == 11){
    return "November Day ".$picker[2];
  }else if((int)$picker[1] == 12){
    return "December Day ".$picker[2];
  }
}

?>