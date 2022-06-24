<!DOCTYPE HTML>
<html lang="en">
<head>
    <title> Post </title>
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
    echo "<div id='site_content'>\n";

    if(isset($_GET['id'])){
      $ID = $_GET['id'];
      //SEZIONE SQL
      $query = mysqli_prepare($conn, "SELECT title, author, body FROM post WHERE idpost=?");
      mysqli_stmt_bind_param($query, 'i', $ID);
      //Esecuzione
      if(!mysqli_stmt_execute($query)){
        echo mysqli_error($conn);
        mysqli_close($conn);
        header('Location: signup.php');
      }
      //Controllo risultato
      $res = mysqli_stmt_get_result($query);
      if (mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        echo "<div id='sidebar_container'>\n <div id='info'>\n <h2>Author: ". $row['author'] . "</h2>\n";
        echo "</div>\n <a class='linkprofilo' href='blog.php'> Blog Homepage </a>\n </div>\n";
        echo "<div id='content'>\n";
        echo "<div id='post'>\n";
        echo $row['body'];
        echo "</div>\n";
        echo "</div>\n";
        }
      else {
        echo "<h1>Error loading...<h1>\n";
        echo "<p>You will be redirected to blog homepage<p><br>\n";
        mysqli_close($conn);
        echo "</div>\n";
        header("refresh:2, url=blog.php");
        exit();
        }
        echo "</div>\n";
        include 'shared/footer.php';
        echo "</div>\n";
        //Chiusura connessione
        mysqli_stmt_close($query);
        mysqli_close($conn);

      }
      else header("url=blog.php");
    ?>
</body>
</html>
