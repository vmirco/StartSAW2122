<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <script src="script/emailinuse.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>
<?php
session_start();
include "shared/header.php";

if(!isset($_SESSION['login'])){
  echo "<div id=site_content>";
  echo "<h1>YOU SHOULDN'T BE HERE</h1>";
  echo "</div>";
  echo "</body>";
  echo "</html>";
  exit();
}

?>
<div id="main">
<div id="site_content">

  <div id="sidebar_container">
    <a class='linkprofilo' href='changepwd.php'>Change your password</a>

  </div>

  <div id="content">

    <div id="form-zone">
    <form id="profileform" action="update_profile.php" method="POST">

      <div class="forms">
        <label> First Name: </label>
        <input type="text" required id="firstname" name="firstname" value= <?php echo $_SESSION["firstname"] ?>>
      </div>

      <div class="forms">
        <label> Second Name: </label>
        <input type="text" required id="lastname" name="lastname" value= <?php echo $_SESSION["lastname"] ?>>
      </div>

      <div class="forms">
        <label> Email </label>
        <input type="email" required onchange="checkemail('checkemail.php')" id="email" name="email" value= <?php echo $_SESSION["email"] ?>><div id="errormail" class="error" style="color: rgb(221, 0, 0);"></div>
      </div>

      <div><input id="modify" type="submit" name="submit" value="Change"></div>
    </form>
    </div>

  </div>
</div>
</div>

<?php include "shared/footer.php"; ?>
</body>
</html>
