<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
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
    <a class="linkprofilo" href='show_profile.php'>Go back to profile</a>
  </div>

<div id="content">

<form id ="pwdform" action="updatepwd.php" method="POST">
  <div class="forms">
    <input type="password" id="currentpass" name="currentpass" placeholder= "********">
    <label> Current password </label>
  </div>

  <div class="forms">
    <input type="password" id="pass" name="pass" placeholder= "********"><div id="errorpass" class="error"></div>
    <label> New password </label>
  </div>

  <div class="forms">
    <input type="password" id="confirm" name="confirm" placeholder = "********"><div id="errorpass2" class="error"></div>
    <label> Confirm new password </label>
  </div>

  <div><input id="modify" type="submit" name="submit" value="Change password"></div>

</form>

</div>
</div>
</div>
<?php include "shared/footer.php" ?>

<script src="script/changepwdScript.js"></script>

</body>
</html>
