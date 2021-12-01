<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Style.css" />
    <title>Customer Order Page</title>
  </head>
  <body>
    <div id="main-info">
      <h1>WELCOME TO RISDEN'S CHEMICALS</h1>
      
      
      <table>
        <caption>List of Items in Stock</caption>
        <thead>
           <tr>
              <th class="product-name"> NAME</th>
              <th class="price"> PRICE</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td> Bleach </td>   
              <td> $100 </td>
          </tr>
          <tr>
              <td> Fabuloso </td>   
              <td> $300 </td>
          </tr>
        </tbody>  
      </table>
      <div id="order-form">
      <form action="../Databases/database.php?customer-order=cus-order-incoming" method="post">
        <div id="input-fields">
          <label for="ctitle">Title:</label><br>
          <input type="text" id="ctitle" name="ctitle" required placeholder="Mr/Ms/Mrs"><br> 
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
        </div>
          <input type="submit" id="submit-btn" value="Place Order"><br> 
      </form>
      </div>
    </div>
  </body>
</html>
