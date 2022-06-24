<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Mailing system</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

<div id="main">
<?php
session_start();
include 'shared/header.php';

if(!isset($_SESSION['login']) || !isset($_SESSION['admin']) || !$_SESSION['admin']){
  echo "<div id=site_content>";
  echo "<h1>YOU SHOULDN'T BE HERE</h1>";
  echo "</div>";
  echo "</body>";
  echo "</html>";
  exit();
}

?>

    <div id="site_content">
      <br><form action="mailer.php" method="POST">
      <h1>Insert subject of the mail:</h1>
      <input type="text" name="subject" id="subject">
      <h2>Insert body of the mail:</h2>
      <textarea cols="35" rows="10" name="mail" id="mail"></textarea>
      <br><br><div><input id="editorsend" type="submit" name="submit" value="Send"></div>
    </form>
    </div>

</div>
<?php include 'shared/footer.php' ?>

</body>
</html>
