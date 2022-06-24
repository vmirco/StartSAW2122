<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update</title>
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
      if(empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"])){
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
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $email = $_POST["email"];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("<h1>$email is not a valid email address</h1>");

      //Formatto i dati da mettere nel db
        $firstname = htmlspecialchars($firstname, ENT_QUOTES);
        $lastname = htmlspecialchars($lastname, ENT_QUOTES);
        $email = htmlspecialchars($email, ENT_QUOTES);

        $currentmail = $_SESSION["email"];

          $query = mysqli_prepare($conn, "UPDATE users SET firstname = ?, lastname = ?, email = ? WHERE email = ?");
          mysqli_stmt_bind_param($query, 'ssss', $firstname, $lastname, $email, $currentmail);
          if(!mysqli_stmt_execute($query)){
            echo "<div id='site_content'>\n";
            echo "<h1>We are sorry, there was an error updating</h1>\n";
            echo "</div>\n";
          }
          else {
            $_SESSION["email"] = $email;
            $_SESSION["firstname"] = $firstname;
            $_SESSION["lastname"] = $lastname;
            echo "<div id='site_content'>\n";
            echo "<h1>Updated succesfully</h1>\n";
            echo "</div>\n";
          }

        mysqli_stmt_close($query);
        mysqli_close($conn);

        echo "</div>\n";
        header("Refresh:2; url=show_profile.php");
    ?>

</body>
</html>
