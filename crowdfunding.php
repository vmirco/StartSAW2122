<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Our crowdfunding!</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

<div id="main">
<?php
  session_start();
  include 'shared/header.php';
  include "shared/database.php";
  $query =  "SELECT percentage, status, goal, completed FROM crowdfunding WHERE idproject='1'";
  $result = mysqli_query($conn, $query);
?>

  <div id="site_content">

    <?php
    if(mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $perc = $row["percentage"];
      $raised = $row["status"];
      $goal = $row["goal"];
      $completed = $row["completed"];

    if(!$completed){
        echo
        "<div id='sidebar_container'>\n
        <form id='donation' action='creditcard.php'>\n
          <div class= 'submit'><input type='submit' id='modify' name='submit' value='Donate now!'></div>\n
        </form>\n
        </div>\n";
        }
    else echo "<div id='sidebar_container'>\n
                <p id='goalreached'>GOAL REACHED!!! Thanks to those who supported us!</p>\n
                </div>\n";
    ?>

    <div id="content">
      <h1>Our crowdfunding programs:</h1>
        <p>These are short, famous texts in English from classic sources like the Bible or Shakespeare. Some texts have word definitions and explanations to help you. Some of these texts are written in an old style of English. Try to understand them, because the English that we speak today is based on what our great, great, great, great grandparents spoke before! Of course, not all these texts were originally written in English. The Bible, for example, is a translation. But they are all well known in English today, and many of them express beautiful thoughts. </p>
        <p>These are short, famous texts in English from classic sources like the Bible or Shakespeare. Some texts have word definitions and explanations to help you. Some of these texts are written in an old style of English. Try to understand them, because the English that we speak today is based on what our great, great, great, great grandparents spoke before! Of course, not all these texts were originally written in English. The Bible, for example, is a translation. But they are all well known in English today, and many of them express beautiful thoughts. </p>
        <p>These are short, famous texts in English from classic sources like the Bible or Shakespeare. Some texts have word definitions and explanations to help you. Some of these texts are written in an old style of English. Try to understand them, because the English that we speak today is based on what our great, great, great, great grandparents spoke before! Of course, not all these texts were originally written in English. The Bible, for example, is a translation. But they are all well known in English today, and many of them express beautiful thoughts. </p>

        <?php
        echo"<h2>Current project</h2>\n
        <p>I am Groot. I am Groot. We are Groot. We are Groot. We are Groot. I am Groot. I am Groot. I am Groot. We are Groot. I am Groot. We are Groot. We are Groot. We are Groot. I am Groot. We are Groot. I am Groot. I am Groot. I am Groot. We are Groot. We are Groot. I am Groot. We are Groot. We are Groot. I am Groot. We are Groot. We are Groot. We are Groot. We are Groot. We are Groot. I am Groot. We are Groot. I am Groot. We are Groot. We are Groot.
        I am Groot. We are Groot. I am Groot. I am Groot. We are Groot. I am Groot. We are Groot. We are Groot. We are Groot. I am Groot. I am Groot. We are Groot. We are Groot. We are Groot. I am Groot. I am Groot.</p>\n
        <div id='barHolder'>\n
          <div id='bar' style='width: " . $perc . "%'></div>\n
        </div>\n
        <div id='projectinfo'>\n
          <div id='startstatus'> RAISED: " . $raised . "$ </div>\n
          <div id='goal'> GOAL: " . $goal ."$ </div>\n
        </div>\n";
      }
      else {
        echo "<h2> New project coming... </h2>\n";
        echo "<p> We will let you know when the compaign will start via our newsletter program.</p>\n";
      }
      ?>
    </div>
  </div>
  <?php include 'shared/footer.php' ?>
</div>

</body>
</html>
