<?php
// THIS IS WHERE ARE FUNCTIONALITIES FOR THE MANAGE STOCK PAGE WILL BE IMPLEMENTED
// EXAMPLE: WHEN ADD STOCK IS CLICKED, A FUNCTIONALITY WILL BE CARRIED OUT


$button = $_GET['button'];

if ($button == "add"){
    ?>

        <form
          action="../ProjectFiles/Javascripts/SidebarButtons.js"
          method="post">
          <label >ID</label>
          <input type="text" id="id" name="id" />
          <label for="product-name">Product Name</label>
          <input type="text" id="product-name" name="product-name" />
          <label for="quantity">Quantity</label>
          <input type="text" id="quantity" name="quantity" />
          <label for="price">Price</label>
          <input type="text" id="price" name="price" />
          <input type="submit" id="submit-btn" value="submit" />
        </form>
        

    <?php
}


?>