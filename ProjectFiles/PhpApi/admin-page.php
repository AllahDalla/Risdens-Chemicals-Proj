<?php 
include '../Databases/database.php';

//php goes here friends.

//THIS PHP DOCUMENT IS USED TO BRING UP THE SIDEBAR PAGES ONLY: EXAMPLE, WHEN MANAGE STOCK BUTTON
// IS CLICKED, THE MANAGE STOCK PAGE ON THE RIGHT-HAND SIDE WILL APPEAR. ALL OTHER FUNCTIONALITIES
// ARE TO BE DONE IN ANOTHER FILE FOR ORGANIZATION





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
          <th>
            <tr>
              <td>ID</td>
              <td>Supplier</td>
              <td>Product Name</td>
              <td>Quantity</td>
              <td>Price</td>
            </tr>
          </th>
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
          <th>
            <tr>
              <td>ID</td>
              <td>Supplier</td>
              <td>Product Name</td>
              <td>Quantity</td>
              <td>Price</td>
            </tr>
          </th>
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
    echo "Page is suppose to show here too. When we get it right, it shall be added in God's grace";
    
}else if($pageinfo == "settings"){
    echo "This is the page to add new users, passwords, change anything in the database etc page.";
}

  if (isset($_GET['insert'], $_POST['supplier'],$_POST['product-name'], $_POST['quantity'], $_POST['price'] ) || isset($_POST['id'])){
    
    $button = $_GET['insert'];

    if($button == "submit-add"){
      $supplier = $_POST['supplier'];
      $product_name = $_POST['product-name'];
      $quantity = $_POST['quantity'];
      $price = $_POST['price'];
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
      echo "New record added";

      header("Location: ../HTMLFiles/admin-homepage.html");
      exit();
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
      header("Location: ../HTMLFiles/admin-homepage.html");
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
      
      header("Location: ../HTMLFiles/admin-homepage.html");
      exit();


    }
  }

  if (isset($_GET['schedule'])){
    $date = $_POST['date'];
    session_start();
    $_SESSION['date'] = $date;
    header("Location: ../HTMLFiles/admin-homepage.html");
    exit();
    


  }
  if(isset($_GET['getschedule'])){
    $date = $_SESSION['date'];
    $stmt = $conn->query("SELECT * FROM `transactions`
                            WHERE delivery_date= $date");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <h1>RISDEN'S CHEMICALS SCHEDULE</h1>
    <div id="scrollable-table">
      <table>
        <th>
          <tr>
            <td>ID</td>
            <td>Order #</td>
            <td>Title</td>
            <td>Customer</td>
            <td>Telephone #</td>
            <td>Delivery Address</td>
            <td>Product</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Discount</td>
            <td>Payment</td>
            <td>Change</td>
            <td>Delivery Date</td>
            <td>Transaction Time</td>
          </tr>
        </th>
        <tbody>
          <?php foreach($results as $row):?>
          <tr>
            <td><?=$row['id'];?></td>
            <td><?="#".$row['order_number'];?></td>
            <td><?=$row['title'];?></td>
            <td><?=$row['customer_name'];?></td>
            <td><?=$row['telephone'];?></td>
            <td><?=$row['delivery_address'];?></td>
            <td><?=$row['product_name'];?></td>
            <td><?=$row['quantity'];?></td>
            <td><?="$".$row['price'];?></td>
            <td><?=$row['discount']."%";?></td>
            <td><?=$row['payment']?></td>
            <td><?=$row['change']?></td>
            <td><?=$row['delivery_date']?></td>
            <td><?=$row['transaction_time']?></td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
    <?php
    
  }

?>