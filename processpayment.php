<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Processing Payment... </title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

  <?php
  session_start();
  include 'shared/header.php';

  if(!isset($_SESSION["login"])){
    echo "<div id='site_content'>\n";
    echo "<h1>YOU ARE NOT LOGGED</h1>\n";
    echo "</div>\n";
    echo "</body>\n";
    echo "</html>\n";
    exit();
  }

  include 'shared/database.php';
  echo "<div id='site_content'>\n";
  echo "<h1>Redirecting to safe payment platform...</h1>\n";
  echo "</div>\n";
  header("Refresh:5; url=crowdfunding.php");

  $query = "SELECT idproject, status, goal FROM crowdfunding WHERE completed='0'";
  $res = mysqli_query($conn,$query);
  if(mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $status = $row["status"];
    $goal = $row["goal"];
    $project = $row["idproject"];
  }

  if(isset($_POST['amount'])){
    $newstatus = $status+$_POST['amount'];
    $newpercentage = (100*$newstatus)/$goal;
    if($newstatus >= $goal){
      $query = "UPDATE crowdfunding SET status = '$newstatus', percentage = '$newpercentage', completed = '1' WHERE idproject = '$project' ";
    }
    else {
      $query = "UPDATE crowdfunding SET status = '$newstatus', percentage = '$newpercentage' WHERE idproject = '$project' ";
    }
    $res = mysqli_query($conn,$query);
    if(!$res){
      echo mysqli_error($conn);
      mysqli_close($conn);
    }
    //Chiusura connessione
    mysqli_close($conn);
  }
  ?>

</body>

</html>
