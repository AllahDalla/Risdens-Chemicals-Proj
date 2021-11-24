<style type="text/css">
table {
margin: 8px;
}

th {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
background: #666;
color: #FFF;
padding: 2px 6px;
border-collapse: separate;
border: 1px solid #000;
}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: .7em;
border: 1px solid #DDD;
}
</style>

<?php


$button = $_GET['button'];

if ($button == "place-order"){
  // Daniel, you will be working right here
  // remove input for id
    ?>
        
}       

        <form
          action="../ProjectFiles/Javascripts/Main.js"
          method="post">
          
          <label for="product-name">Product Name</label>
          <input type="text" id="product-name" name="product-name" />
          <label for="quantity">Quantity</label>
          <input type="text" id="quantity" name="quantity" />
          <label for="price">Price</label>
          <input type="text" id="price" name="price" />
          <input type="submit" id="submit-btn" value="submit" />
        </form>
        

    <?php
}else if($button == "generate-receipt"){
  echo "This button should make a fancy table with a printable receipt.";
}
else if($button == "view-schedule"){
    echo "This should show the schedule.";
}


?>