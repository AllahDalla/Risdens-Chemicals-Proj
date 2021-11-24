<?php


$button = $_GET['button'];

if ($button == "place-order"){
  // Daniel, you will be working right here
  // remove input for id
    ?>
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