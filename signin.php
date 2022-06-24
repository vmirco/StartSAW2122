<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log</title>
    <link rel="stylesheet" type="text/css" href="style/formstyle.css" />
    <link rel="icon" href="images/pine-tree.png" type= "image/png" />
</head>

<body>

<section>
  <div class="myform">

    <form action="login.php" method="POST" >
      <?php
        if(isset($_GET['msg'])){
          $Message = "Email/Password incorrect";
          echo $Message;
        }
      ?>
    <h1>Log In</h1>

    <div class="forms">
    <input type="email" required id="email" name="email">
    <label>Email</label>
    </div>

    <div class="forms">
    <input type="password" required id="pass" name="pass">
    <label>Password</label>
    </div>

    <div> <label>Not registred yet? <a href="signup.php"> Register here!</a></label> </div>
    <div> <a href="index.php"> Click here</a><label> to go back to the main page</label> </div>

    <div class= "submit"><input type="submit" name="submit" value="Submit"></div>

    </form>

  </div>

</section>

</body>
</html>
