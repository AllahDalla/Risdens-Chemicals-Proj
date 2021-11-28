<?php

session_start();

if(isset($_SESSION['login'])){
 
}else{
  header("Location: ../HTMLFiles/staff-login.php");
  exit();
}
// THIS IS WHERE ARE FUNCTIONALITIES FOR THE MANAGE STOCK PAGE WILL BE IMPLEMENTED
// EXAMPLE: WHEN ADD STOCK IS CLICKED, A FUNCTIONALITY WILL BE CARRIED OUT

include "../Databases/database.php";

$button = $_GET['button'];

if ($button == "add"){
?>

        <form id="add-stock-form"
          action="../PhpApi/admin-page.php?insert=submit-add"
          method="post">
          <label >Supplier</label>
          <input type="text" id="supplier" name="supplier" required/>
          <label for="product-name">Product Name</label>
          <input type="text" id="product-name" name="product-name" required/>
          <label for="quantity">Quantity</label>
          <input type="text" id="quantity" name="quantity" required/>
          <label for="price">Price</label>
          <input type="text" id="price" name="price" required/>
          <input type="submit" id="submit-btn" value="submit" />
        </form>
        

<?php
}else if ($button == "update"){
?>
  <form id="add-stock-form"
    action="../PhpApi/admin-page.php?insert=submit-update"
    method="post">
    <label for="id">ID</label>
    <input type="text" id="id" name="id" required>
    <label for="supplier">Supplier</label>
    <input type="text" id="supplier" name="supplier" />
    <label for="product-name">Product Name</label>
    <input type="text" id="product-name" name="product-name" />
    <label for="quantity">Quantity</label>
    <input type="text" id="quantity" name="quantity" />
    <label for="price">Price</label>
    <input type="text" id="price" name="price" />
    <input type="submit" id="submit-btn" value="submit" />
  </form>

<?php
}else if ($button == "view-log"){
  $stmt= $conn->query("SELECT * FROM `logs`");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
?>
  <div id="main-info">
    <h1>RISDEN'S CHEMICALS STOCK LOGS</h1>
    <div id="scrollable-table">
      <table>
        <th>
          <tr>
            <td>ID</td>
            <td>Affected Product ID</td>
            <td>Supplier</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Status</td>
            <td>Time</td>
          </tr>
        </th>
        <tbody>
          <?php foreach($results as $row):?>
          <tr>
            <td><?=$row['id'];?></td>
            <td><?=$row['product_id'];?></td>
            <td><?=$row['changed_supplier'];?></td>
            <td><?=$row['changed_product_name'];?></td>
            <td><?=$row['changed_quantity'];?></td>
            <td><?='$'.$row['changed_price'];?></td>
            <td><?=$row['operation'];?></td>
            <td><?=$row['log_time'];?></td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>

<?php
}


?>