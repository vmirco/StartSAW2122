<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Saving post</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

<?php
session_start();
if(!isset($_SESSION["login"])){
  echo "<div id='site_content'>\n";
  echo "<h1> YOU ARE NOT LOGGED </h1>";
  echo "</div>\n";
}
else{
//VARIABILI INPUT
  $title = trim($_POST['title']);
  $post = trim($_POST['mytextarea']);
  $author = $_SESSION['firstname'] . " " . $_SESSION['lastname'];

//CONNESSIONE DATABASE
  include "shared/database.php";

  //Pulizia Input
  $title =  mysqli_real_escape_string($conn, $title);
  $post =  mysqli_real_escape_string($conn, $post);

  //Inserimento nel DATABASE
  $query = "INSERT INTO post (title, author, body) VALUES ('$title', '$author', '$post')";
  //Esecuzioneo
  $res = mysqli_query($conn,$query);
  if(!$res){
    echo mysqli_error($conn);
    mysqli_close($conn);
    header('Location: newpost.php');
  }
  //Chiusura connessione
  mysqli_close($conn);
  //Redirect
  header('Location: blog.php');
}
?>

</body>
</html>
