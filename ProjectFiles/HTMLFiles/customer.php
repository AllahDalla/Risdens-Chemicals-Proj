<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Style.css" />
    <title>Customer Order Page</title>
  </head>
  <body >
      <div id= title_box>
      <p class="cus_title">WELCOME TO RISDEN'S CHEMICALS</p>
      </div>
      <table id="products";table border = 2>
          <tr>
              <th> NAME</th>
              <th> PRICE</th>
              <th> IMAGE</th>
          </tr>
          <tr>
              <td> Bleach </td>   
              <td> 100 </td>
              <td>     </td>
            </tr>
      </table>
      <div id="cus_info">
      <form action="../Databases/database.php?customer-order=cus-order-incoming" method="post">
          <label for="ctitle">Title:</label><br>
          <input type="text" id="ctitle" name="ctitle" required><br> 
          <label for="cname">Name:</label><br>
          <input type="text" id="cname" name="cname" required><br> 
          <label for="cp_name">Product Name:</label><br>
          <input type="text" id="cp_name" name="cp_name" required><br> 
          <label for="cquantity">Quantity:</label><br>
          <input type="text" id="cquantity" name="cquantity" required><br> 
          <label for="cnumber">Telephone Number:</label><br>
          <input type="text" id="cnumber" name="cnumber" required><br> 
          <label for="caddress">Delivery Address:</label><br>
          <input type="text" id="caddress" name="caddress" required><br> 
          <label for="ddate">Delivery Date:</label><br>
          <input type="date" id="ddate" name="ddate" required><br> 
          <input type="submit" value="Submit"><br> 
      </form>
      </div>
     </div>
  </body>
</html>
