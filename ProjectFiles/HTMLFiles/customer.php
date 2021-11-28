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
      <form customer="/customer_page.php">
          <label for="cname">Name:</label><br>
          <input type="text" id="cname" name="cname"><br> 
          <label for="cnumber">Number:</label><br>
          <input type="text" id="cnumber" number="cnumber"><br> 
          <label for="caddress">Address:</label><br>
          <input type="text" id="caddress" address="caddress"><br> 
          <label for="ddate">Delivery Date:</label><br>
          <input type="date" id="ddate" date="ddate"><br> 
          <input type="submit" value="Submit"><br> 
      </form>
      </div>
     </div>
  </body>
</html>
