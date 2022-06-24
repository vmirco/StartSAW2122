<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login result</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

<?php
session_start();

  include 'shared/header.php';
  echo "<div id='main'>\n";
  echo "<div id='site_content'>\n";

//VARIABILI INPUT
  $email = $_POST['email'];
  $password = $_POST['pass'];
//MANCANO DEI DATI
    if(empty($email) || empty($password)){
      echo "<h1>Check again, you may have missed some data!</h1>\n";
      echo "</div>\n";
      echo "</div>\n";
      echo "</body>\n";
      echo "</html>\n";
      header("Refresh:2; url=signin.php");
      exit();
    }

//CONNESSIONE DATABASE
  include "shared/database.php";
  //Pulizia Input
  $email =  mysqli_real_escape_string($conn, $email);
  //Preparazione query
  $query = mysqli_prepare($conn, "SELECT firstname,lastname,pwd,newsletter,admin FROM users WHERE email=?");
  mysqli_stmt_bind_param($query, 's', $email);
  //Esecuzione e controllo risultato
  if(mysqli_stmt_execute($query)){
    $result = mysqli_stmt_get_result($query);
    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      if(password_verify($password, $row["pwd"])){
        $_SESSION["login"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["firstname"] = $row['firstname'];
        $_SESSION["lastname"] = $row['lastname'];
        $_SESSION["newsletter"] = $row["newsletter"];
        $_SESSION["admin"] = $row["admin"];
        echo "<h1>Welcome back, " . htmlspecialchars($row["firstname"], ENT_QUOTES) . "</h1>\n";
        echo "</div>\n";
        echo "</div>\n";
      }
      else{
        echo "<h1>Wrong credentials, are you even registered?</h1>\n";
        echo "</div>\n";
        echo "</div>\n";
        mysqli_stmt_close($query);
        mysqli_close($conn);
        echo "</body>\n";
        echo "</html>\n";
        header("Refresh:2; url=signin.php");
        exit();
      }
    }
    else{
      echo "<h1>Wrong credentials, are you even registered?</h1>\n";
      echo "</div>\n";
      echo "</div>\n";
      mysqli_stmt_close($query);
      mysqli_close($conn);
      echo "</body>\n";
      echo "</html>\n";
      header("Refresh:2; url=signin.php");
      exit();
    }
  }
  else {
    echo "<h1>Error registering</h1>\n";
    echo "</div>\n";
    echo "</div>\n";
    mysqli_stmt_close($query);
    mysqli_close($conn);
    echo "</body>\n";
    echo "</html>\n";
    header("Refresh:2; url=signup.php");
    exit();
  }

//CHIUSURA CONNESSIONE DATABASE e QUERY
  mysqli_stmt_close($query);
  mysqli_close($conn);

  header("Refresh:2; url=index.php");
?>

</body>
</html>
