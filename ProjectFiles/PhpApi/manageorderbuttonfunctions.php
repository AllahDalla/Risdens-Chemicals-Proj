<?php

session_start();

if(isset($_SESSION['login'])){
  
}else{
  header("Location: ../HTMLFiles/staff-login.php");
  exit();
}

include "../Databases/database.php";

$button = $_GET['button'];

if ($button == "place-order"){
  // Daniel, you will be working right here
  // remove input for id

  include "../Databases/database.php";
  $sql = "SELECT * FROM `incoming_orders`";

  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->query($sql);

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>       

      <h1>Incoming Orders</h1>
      <div id="scrollable-table">
        <table>
          <th>
            <tr>
              <td>ID</td>
              <td>Title</td>
              <td>Customer Name</td>
              <td>Telephone</td>
              <td>Product Name</td>
              <td>Quantity</td>
              <td>Delivery Date</td>
              <td>Transaction Time</td>
            </tr>
          </th>
          <tbody>
            <?php foreach($results as $row):?>
            <tr>
              <td><?=$row['id'];?></td>
              <td><?=$row['title'];?></td>
              <td><?=$row['customer_name'];?></td>
              <td><?=$row['telephone'];?></td>
              <td><?=$row['product_name'];?></td>
              <td><?=$row['quantity'];?></td>
              <td><?=$row['delivery_date'];?></td>
              <td><?=$row['transaction_time'];?></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>


        <form
          action="../PhpApi/admin-page.php?insert=submit-place-order"
          method="post">
          <label for="title">Title</label>
          <input type="text" id="title" name="title" />
          <label for="customer-name">Customer Name</label>
          <input type="text" id="customer-name" name="customer-name" />
          <label for="tele">Telephone</label>
          <input type="text" id="tele" name="tele" />
          <label for="address">Delivery Adress</label>
          <input type="text" id="address" name="address" />
          <label for="product-name">Product Name</label>
          <input type="text" id="product-name" name="product-name" />
          <label for="quantity">Quantity</label>
          <input type="text" id="quantity" name="quantity" />
          <label for="price">Price</label>
          <input type="text" id="price" name="price" />
          <label for="discount">Discount</label>
          <input type="text" id="discount" name="discount" />
          <label for="delivery">Delivery Date</label>
          <input type="date" id="delivery" name="delivery" />
          <input type="submit" id="submit-btn" value="submit" />
        </form>
        
<?php
}else if($button == "generate-receipt"){
  // echo "This button should make a fancy table with a printable receipt.";
  $stmt= $conn->query("SELECT * FROM `transactions`");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  
  ?>

  <div id="main-info">
    <h1>RISDEN'S CHEMICALS ORDERS</h1>
    <div id="scrollable-table">
      <table>
        <th>
          <tr>
            <td>Product ID</td>
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
  <form
    action="../PhpApi/Email.php?email=send-mail"
    method="post">
    <label for="id">ID</label>
    <input type="text" id="id" name="id" required/>
    <label for="id">Payment</label>
    <input type="text" id="payment" name="payment" required/>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" palceholder="someone@gmail.com" required/>
    <input type="submit" id="submit-btn" value="submit" />
  </form>
  </div>
  <?php

}
else if($button == "view-schedule"){
  ?>
  <form action="../PhpApi/admin-page.php?schedule=yes" method="post">
    <label for="date">Schedule Picker</label>
    <input type="date" name="date" id="date" required>
    <input type="submit" value="submit" id="submit-schedule-btn" required>
  </form>







  <?php
}


?>