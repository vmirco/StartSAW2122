<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration result</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

<?php
  include 'shared/header.php';
  echo "<div id='main'>\n";
  echo "<div id='site_content'>\n";

//VARIABILI INPUT
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $email = trim($_POST['email']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("<h1>$email is not a valid email address</h1>");
  $password1 = trim($_POST['pass']); //Cosi posso levare spazi non voluti, accidentali, nella password
	$password2 = trim($_POST['confirm']);

  //PASSWORD CORTA
  if(strlen($password1) < 8){
    echo "<h1>Password too short, 8 characters needed</h1>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</body>\n";
    echo "</html>\n";
    header("Refresh:2; url=signup.php");
    exit();
  }
  //LE DUE PASSWORD SONO DIVERSE
  else if($password1 != $password2){
    echo "<h1>Passwords did not match</h1>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</body>\n";
    echo "</html>\n";
    header("Refresh:2; url=signup.php");
    exit();
  }
  //LE DUE PASSWORD SONO DIVERSE
  else if($password1 != $password2){
    echo "<h1>Passwords did not match</h1>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</body>\n";
    echo "</html>\n";
    header("Refresh:2; url=signup.php");
    exit();
  }
  //MANCANO DEI DATI
  else if(empty($firstname) || empty($lastname) || empty($email) || empty($password1) || empty($password2)){
    echo "<h1>Check again, you may have missed some data!</h1>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</body>\n";
    echo "</html>\n";
    header("Refresh:2; url=signup.php");
    exit();
  }

//CONNESSIONE DATABASE
  include "shared/database.php";

  //Pulizia Input
  $cryptedpwd = password_hash($password1, PASSWORD_DEFAULT);
  $firstname = htmlspecialchars($firstname, ENT_QUOTES);
  $lastname = htmlspecialchars($lastname, ENT_QUOTES);
  $email = htmlspecialchars($email, ENT_QUOTES);

  //Inserimento nel DATABASE
  $query = mysqli_prepare($conn, "INSERT INTO users (firstname, lastname, email, pwd) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($query, 'ssss', $firstname, $lastname, $email, $cryptedpwd);

  //Esecuzione
  if(!mysqli_stmt_execute($query)){
    include 'shared/header.php';
    echo "<div id='main'>\n";
    echo "<div id='site_content'>\n";
    echo "<h1>There was an error during the registration, check again your mail</h1>\n";
    echo "</div>\n";
    echo "</div>\n";
    echo "</body>\n";
    echo "</html>\n";
    mysqli_stmt_close($query);
    mysqli_close($conn);
    header("Refresh:3; url=signup.php");
  }
  else {
    mysqli_stmt_close($query);
    //Chiusura connessione
    mysqli_close($conn);
    //Redirect
    echo "</body>\n";
    echo "</html>\n";
    header('Location: signin.php');
  }
?>
