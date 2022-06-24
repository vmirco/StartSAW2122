<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>New Post</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <script src='https://cdn.tiny.cloud/1/w0lsarhmm5kncuiwi2mc5tgzu4ds8t0u4o1b8rwcc73dox6y/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
      <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: 'image',
      });
      </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

<div id="main">
<?php
session_start();
include 'shared/header.php';

if(!isset($_SESSION["login"])){
  echo "<div id='site_content'>\n";
  echo "<h1> Authenticate yourself before writing a new post! </h1>";
  echo "</div>\n";
  header("Refresh:2; url=signin.php");
  exit();
}

?>

  <div id="site_content">
    <div id="sidebar_container">
      <a class='linkprofilo' href='blog.php'> Go back </a>
      <a class='linkprofilo' href='index.php'> Menu </a>
    </div>

    <div id="content">
      <form action="savepost.php" method="POST">
        <h1>Title(it won't be shown in the post page):</h1>
        <input type="text" name="title" id="title">
        <h2>Post:</h2>
        <textarea id="mytextarea" name="mytextarea">Hello, World!</textarea>
        <br><br><div><input id="editorsend" type="submit" name="submit" value="Publish now!"></div>
      </form>
    </div>
  </div>
<?php include 'shared/footer.php'; ?>
</div>

</body>
</html>
