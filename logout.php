<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Logout</title>
  <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>
<body>

<?php
  session_start();

  session_destroy();

  setcookie(session_name(),'',time() - 42000);

  echo "<h1 style='padding: 50px 0 50px; text-align: center; text-transform: uppercase; font-family: Arial, Helvetica, sans-serif;'>GOODBYE, WE'LL MISS YOU :(</h1>";
  header("Refresh:2; url=index.php");
?>

</body>
</html>
