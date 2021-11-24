<?php 

//php goes here friends.

//THIS PHP DOCUMENT IS USED TO BRING UP THE SIDEBAR PAGES ONLY: EXAMPLE, WHEN MANAGE STOCK BUTTON
// IS CLICKED, THE MANAGE STOCK PAGE ON THE RIGHT-HAND SIDE WILL APPEAR. ALL OTHER FUNCTIONALITIES
// ARE TO BE DONE IN ANOTHER FILE FOR ORGANIZATION

$pageinfo = $_GET['page'];

if($pageinfo == "managestock"){ //checks to see which page is being requested to be displayed. This is how the pages will be requested from the sidebar buttons
    ?>

    <!-- HTML for main area of manage stock starts here -->

    <div id="main-info">
      <h1>RISDEN'S CHEMICALS STOCK DATABASE</h1>
      <table>
        <th>
          <tr>
            <td>ID</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>Price</td>
          </tr>
        </th>
        <tbody>
          <tr>
            <td>1</td>
            <td>Bleach</td>
            <td>50Gallons</td>
            <td>$120</td>
          </tr>
        </tbody>
      </table>
      <div class="stock-btn">
        <button id="add-stock-btn" class="btn-1">ADD STOCK</button>
        <button id="update-stock-btn" class="btn-1">UPDATE STOCK</button>
      </div>
      <!-- This is where the things will come up when each button is clicked -->
      <div id="result-area"></div>
    </div>

    <?php
}else if($pageinfo == "manageorder"){
    echo "Page is suppose to show something about the management of order. What am I saying? IRDK";
}else if($pageinfo == "financialreport"){
    echo "Page is suppose to show here too. When we get it right, it shall be added in God's grace";
}else if($pageinfo == "settings"){
    echo "This is the page to add new users, passwords, change anything in the database etc page.";
}

?>