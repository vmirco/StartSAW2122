<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Newsletter</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

<div id="main">
<?php
  session_start();
  include 'shared/header.php';
  include 'shared/database.php';

  if(!isset($_SESSION["login"])){
    echo "<div id='site_content'>\n";
    echo "<h1> You have to be logged in to subscribe to the newsletter! </h1>";
    echo "</div>\n";
    header("Refresh:2; url=signin.php");
    exit();
  }

  $email = $_SESSION["email"];

  //Preparazione query
  $query = "UPDATE users SET newsletter=1 WHERE email = '$email' ";
  //Esecuzione e controllo risultato
  $res = mysqli_query($conn,$query);
  if($res) {
    echo "<div id='site_content'>\n";
    echo "<h1> You successfully subscribed to our newsletter! </h1>";
    echo "</div>\n";
    mysqli_close($conn);
    $_SESSION["newsletter"] = 1;
    header("Refresh:2; url=newsletter_form.php");
  }
  else {
    echo "<div id='site_content'>\n";
    echo "<h1> Sorry, there was an error. Please try again. </h1>";
    echo "</div>\n";
    mysqli_close($conn);
    header("Refresh:2; url=newsletter_form.php");
  }
?>

</body>
</html>
