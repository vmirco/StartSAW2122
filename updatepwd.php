<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Password</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>
  <div id="main">
    <?php
      session_start();
      include 'shared/header.php';

//controllo che i dati siano arrivati
      if(empty($_POST["currentpass"]) || empty($_POST["pass"]) || empty($_POST["confirm"])){
        echo "<div id='site_content'>\n";
        echo "<h1> MISSING DATA </h1>";
        echo "</div>\n";
        echo "</div>\n";
        echo "</body>";
        echo "</html>";
        exit();
      }

      include 'shared/database.php';

//I campi compilati del form
      $currentpassword = trim($_POST["currentpass"]);
      $password = trim($_POST["pass"]);
      $confirm = trim($_POST["confirm"]);
      $email = $_SESSION["email"];

      $query = "SELECT pwd FROM users WHERE email='$email'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      if(!password_verify($currentpassword, $row["pwd"])){
        echo "<div id='site_content'>\n";
        echo "<h1>Wrong password! Is that really you, " . $_SESSION["firstname"] . "?</h1>\n";
        echo "</div>\n";
        mysqli_close($conn);
        header("Refresh:2; url=show_profile.php");
        exit();
      }
      else{
        if($password != $confirm){
          echo "<div id='site_content'>\n";
          echo "<h1>Passwords did not match!</h1>\n";
          echo "</div>\n";
          mysqli_close($conn);
          header("Refresh:2; url=show_profile.php");
          exit();
          }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET pwd = '$hash' WHERE email = '$email' ";
        $res = mysqli_query($conn,$query);
        if(!$res){
          echo "<div id='site_content'>\n";
          echo "<h1>We are sorry, there was an error updating</h1>\n";
          echo "</div>\n";
          mysqli_close($conn);
          header("Refresh:2; url=show_profile.php");
          exit();
          }
        else {
          echo "<div id='site_content'>\n";
          echo "<h1>Updated succesfully</h1>\n";
          echo "</div>\n";
        }
      }

      mysqli_close($conn);

      echo "</div>\n";
      header("Refresh:2; url=show_profile.php");
    ?>

</body>
</html>
