<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Our newsletter!</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

<div id="main">
<?php
session_start();
include 'shared/header.php';
?>

  <div id="site_content">

    <div id="sidebar_container">
        <?php
        if(!isset($_SESSION["newsletter"]) || $_SESSION["newsletter"] == 0){
          echo "<form id='newsletter' action='newsletter.php' method='POST'>";
          echo "<div><input id='newsletterbutton' type='submit' name='submit' value='Join our newsletter!'></div>\n";
          echo "</form>";
        }
        else if(isset($_SESSION["newsletter"]) && $_SESSION["newsletter"]){
          echo "<form id='newsletter' action='unsubscribe.php' method='POST'>";
          echo "<div><input id='newsletterbutton' type='submit' name='submit' value='Unsubscribe'></div>\n\n";
          echo "</form>";
        }
        if (isset($_SESSION["admin"]) && $_SESSION["admin"])
          echo "<a class='linkprofilo' href='mail.php'>You're an admin, update our subs with an email!</a>\n";
        ?>
    </div>

    <div id="content">
      <h1>Our newsletter program:</h1>
        <p>These are short, famous texts in English from classic sources like the Bible or Shakespeare. Some texts have word definitions and explanations to help you. Some of these texts are written in an old style of English. Try to understand them, because the English that we speak today is based on what our great, great, great, great grandparents spoke before! Of course, not all these texts were originally written in English. The Bible, for example, is a translation. But they are all well known in English today, and many of them express beautiful thoughts. </p>
        <p>These are short, famous texts in English from classic sources like the Bible or Shakespeare. Some texts have word definitions and explanations to help you. Some of these texts are written in an old style of English. Try to understand them, because the English that we speak today is based on what our great, great, great, great grandparents spoke before! Of course, not all these texts were originally written in English. The Bible, for example, is a translation. But they are all well known in English today, and many of them express beautiful thoughts. </p>
    </div>

  </div>

</div>
<?php include 'shared/footer.php' ?>

</body>
</html>
