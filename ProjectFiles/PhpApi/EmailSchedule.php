<?php
include "../Databases/database.php";

if (isset($_POST['schedule'], $_POST['date'])){

    $date = $_POST['date'];


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
     header("Location: ../HTMLFiles/admin-homepage.html");
     exit();
}

?>