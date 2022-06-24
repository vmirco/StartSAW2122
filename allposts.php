<!DOCTYPE HTML>
<html lang="en">
<head>
    <title> Posts menu </title>
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

    //SEZIONE SQL
    $query = "SELECT * FROM post";
    //Esecuzioneo
    $res = mysqli_query($conn,$query);
    //Controllo risultato
    if (mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res))
      echo
      "<div class = 'blogbox'>
      <h1><a href='details.php?id={$row['idpost']}'>" . $row['title']. "</a> <br> di " . $row['author'] . "</h1>
      </div>\n";
      }
    else {
      echo "<h1>No article found<h1>\n";
      echo "<p><a href='newpost.php'>Click here, </a> and try to write one on your own!<p><br>\n";
      }
    echo "</div>\n";
    include 'shared/footer.php';
    echo "</div>\n";
    
    //Chiusura connessione
    mysqli_close($conn);
    ?>
</body>
</html>
