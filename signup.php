<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registrate</title>
        <link rel="stylesheet" type="text/css" href="style/formstyle.css" />
        <link rel="icon" href="images/pine-tree.png" type= "image/png" />
        <script src="script/emailinuse.js"></script>
    </head>

    <body>
      <section>
        <div class="myform">
            <form id="regform" action="registration.php" method="POST" >

              <h1>Sign Up</h1>

              <div class="forms">
                <input type="text" required id="firstname" name="firstname">
                <label>FirstName</label>
              </div>

              <div class="forms">
                <input type="text" required id="lastname" name="lastname">
                <label>LastName</label>
              </div>

              <div class="forms">
                <input type="email" required onchange="checkemail('checkemail.php');" id="email" name="email"><div id="errormail" class="error" style="color: rgb(221, 0, 0);"></div>
                <label>Email</label>
              </div>

              <div class="forms">
                <input type="password" required id="pass" name="pass"><div id="errorpass" class="error"></div>
                <label>Password</label>
              </div>

              <div class="forms">
                <input type="password" required id="confirm" name="confirm"><div id="errorpass2" class="error" ></div>
                <label>Confirm Password</label>
              </div>
              <div>
                  <label>Already registred? <a href="signin.php"> Login your account!</a></label>
                  <div> <a href="index.php"> Click here</a><label> to go back to the main page</label> </div>
              </div>

              <div class= "submit"><input type="submit" name="submit" value="Register"></div>
            </form>
          </div>
        </section>

        <script src="script/signupScript.js"></script>
    </body>
</html>
