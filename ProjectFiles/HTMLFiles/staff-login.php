<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../CSSFiles/styles.css" />
    <script src="../Javascripts/Login.js" type="text/javascript"></script>
    <title>STAFF LOGIN</title>
  </head>
  <body class="Ramona-body">
    <div id="items-center">
      <form action="../Databases/database.php" method="post">
        <div id="MONA_STAFF_box">
          <label for="roles">Please select user type...</label>
          <select name="roles" id="roles">
            <option value="cashier">CASHIER</option>
            <option value="admin">ADMIN</option>
          </select>
          <div class="u_name">
            <label for="username">Enter username</label>
            <input type="mona_text" id="username" name="username" placeholder="NAME" />
          </div>
          <div class="u_pwd">
            <label for="pwd">Enter password</label>
            <input type="mona_text" id="pwd" name="pwd" placeholder="PASSWORD" />
          </div>
          <button type="submit" id="m_submit" value="submit">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>

<?php
if(isset($_GET['logout'])){
  session_start();
  session_destroy();
}

?>

