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
  include "shared/database.php";


  if(!isset($_SESSION["login"])){
    echo "<div id='site_content'>\n";
    echo "<h1> YOU ARE NOT LOGGED </h1>";
    echo "</div>\n";
  }
  else{
  $email = $_SESSION["email"];
  //Preparazione query
  $query = "UPDATE users SET newsletter=0 WHERE email = '$email' ";
  //Esecuzione e controllo risultato
  $res = mysqli_query($conn,$query);
  if($res) {
    echo "<div id='site_content'>\n";
    echo "<h1> We are deeply sorry that you unsubscribed from our newsletter, we hope to see you again! </h1>";
    echo "</div>\n";
    mysqli_close($conn);
    $_SESSION["newsletter"] = 0;
    header("Refresh:2; url=newsletter_form.php");
  }
  else {
    echo "<div id='site_content'>\n";
    echo "<h1> Sorry, there was an error. Please try again. </h1>";
    echo "</div>\n";
    mysqli_close($conn);
    header("Refresh:2; url=newsletter_form.php");
  }

  }
?>

</body>
</html>
