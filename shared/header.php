<header>
    <div id="logo">
        <div id="logo_text">
            <a href="index.php" >
              <img src= "images/title.png" alt="Logo sito">
            </a>
        </div>
    </div>
    <div id="menubar">
        <?php
        if(!isset($_SESSION["login"]))
             echo ' <nav>
             <div class="navicon">
               <div></div>
             </div>

             <a class= "menu" href="index.php">
              <img src="images/treehouse.png" alt="Albero">
              Home</a>

             <a class= "menu" href="crowdfunding.php">
              <img src="images/crowdfunding.png" alt="Crowdfunding logo">
              Support us!</a>

             <a class= "menu" href="about_us.php">
              <img src="images/aboutus.png" alt="Aboutus logo">
              About us</a>

             <a class= "menu" href="blog.php">
              <img src="images/blog.png" alt="Blog logo">
              Blog</a>

             <a class= "menu" href="signin.php">
              <img src="images/login.png" alt="Login logo">
              Sign In</a>

             <a class= "menu" href="signup.php">
              <img src="images/signin.png" alt="Registration logo">
              Sign Up</a>
              </nav>';
        else
            echo '<nav>
                  <div class="navicon">
                    <div></div>
                  </div>

                  <a class= "menu" href="index.php">
                    <img src="images/treehouse.png" alt="Albero">
                    Home</a>

                  <a class= "menu" href="crowdfunding.php">
                    <img src="images/crowdfunding.png" alt="Crowdfunding logo">
                    Support us!</a>

                  <a class= "menu" href="about_us.php">
                    <img src="images/aboutus.png" alt="Aboutus logo">
                    About us</a>

                  <a class= "menu" href="blog.php">
                    <img src="images/blog.png" alt="Blog logo">
                    Blog</a>

                  <a class= "menu" href="show_profile.php">
                    <img src="images/login.png" alt="Profile logo">
                    Profile</a>

                  <a class= "menu" href="logout.php">
                    <img src="images/logout.png" alt="Logout logo">
                    Log out</a>
                  </nav>';
        ?>
    </div>
</header>
