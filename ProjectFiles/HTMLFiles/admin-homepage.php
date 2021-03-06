<?php
session_start();

if(isset($_SESSION['login'])){
  
}else{
  header("Location: ../HTMLFiles/staff-login.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Risden's Chemicals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Stylesheet link-->
    <link rel="stylesheet" href="../CSSFiles/styles.css" />
    <!--Online Stylesheet for icons-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!--Script Link-->
    <script src="../Javascripts/Main.js" type="text/javascript"></script>
  </head>

  <body>
    <div class="header">
      <i class="fa fa-bug"></i>
      <h1>Risden's Chemicals : <?=$_SESSION['role'];?> PAGE</h1>
    </div>

    <!--SideBar-->
    <div class="sidebar">
      <div>
        <i class="fa fa-database" aria-hidden="true"></i>
        <a href="" class="pulsate" id="MS-btn">Manage Stock</a>
      </div>

      <div>
        <i class="fa fa-usd" aria-hidden="true"></i>
        <a href="" class="pulsate" id="MO-btn">Manage Order</a>
      </div>

      <div>
        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
        <a href="" class="pulsate" id="GFR-btn">Generate Report</a>
      </div>

      <div>
        <i class="fa fa-cog" aria-hidden="true"></i>
        <a href="" class="pulsate" id="settings-btn">Settings</a>
      </div>

      <div>
        <i class="fa fa-sign-out"></i>
        <a href="../HTMLFiles/staff-login.php?logout=yes" class="pulsate" id="logout-btn">Logout</a>
      </div>
    </div>
    <!-- This is where all data refreshes, main space, main function will occur -->
    <div id="stock-result" class="main-area">
      <div class="animation">
        <div class="blobs-container">
          <div class="blob white"></div>
          <div class="blob red"></div>
          <div class="blob orange"></div>
          <div class="blob yellow"></div>
          <div class="blob blue"></div>
          <div class="blob green"></div>
          <div class="blob purple"></div>
          <div class="blob"></div>
        </div>
      </div>
    </div>
  </body>
</html>
