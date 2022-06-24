<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>The StartPlanet</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
    <script src="script/carousel.js"></script>
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

    <div class="row">
      <div class="column1">
        <div class= "box">
        <a href="crowdfunding.php" >
          <div class="slideshow-container">
            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="images/endangered.jpg" alt="Endengered plant" style="width:100%">
            </div>

            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="images/monki.jpg" alt="Common monkey" style="width:100%">
            </div>

            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="images/waterplants.jpg" alt="Woman water plants" style="width:100%">
            </div>

          </div>
          <br>
        </a>

          <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
          </div>

          <a href="crowdfunding.php" >
            <h2>Crowdfunding - Help us helping the planet by planting 500'00 trees in Amazon!</h2>
          </a>
        </div>
      </div>

    <div class="column2">
      <div class= "box">
        <a href="blog.php" >
          <img src="images/earth-day.jpg" alt="Earth day logo by Nike" style="width:100%">
          <h2>Blog - Subscribe today! Everyday is perfect day to start caring about our home</h2>
        </a>
      </div>
      <div id= "box2" class = "box">
        <a href="details.php?id=2">
          <img src="images/sloth.jpg" alt="Common sloth" style="width:100%">
          <h2>Sloth Stories: Tales about a beautiful animal</h2>
        </a>
      </div>
    </div>
  </div>

      <div id=newsletterlink>
      <a href= "newsletter_form.php">
        <div id="banner"><h1>NEWSLETTER PROGRAM</h1></div>
      </a>
      </div>

      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_item">
            <h3>Latest News</h3>
            <h4>Project Started</h4>
            <h5>December 04, 2021</h5>
            <p><a href="details.php?id=2">Sloth Stories: Chapter One</a></p>
            <p><a href="details.php?id=5">Australian Bushfire Crisis</a></p>
            <p><a href="details.php?id=8">7 Ways Leonardo DiCaprio Is Working to Save the Planet Every Day</a></p>
          </div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
            <div class="sidebar_item">
              <h3>Search News</h3>
                <form id="searchbar" action="search.php" method="POST">
                  <input id="search" name="search" type="text" placeholder="Search now!">
                  <input id="searchbutton" type="submit" value="search">
                </form>
            </div>
          </div>
        </div>
        <div id="content">
          <h1>Welcome to the StartPlanet Website</h1>
            <p>We are a reality of environmental activists who are willing to change the world. Our main project is to plant 500'000 trees in Amazon to help fighting CO2 emissions and climate change.</p>
            <p>We are currently collecting 7'500$ to help amazon communities planting 500'000 trees and fighting CO2 emission and deforestation, which are two main environmental problems caused by climate change nowadays.
            Climate change is something that is having, and increasingly will have, a huge effect on extreme poverty. It’s people in extreme poverty who will be the worst affected by it. So we feel we need to get into that area, simply in order to carry out successfully a mission of continuing to reduce, large-scale CO2 emissions and deforestation.</p>
        </div>
    </div>

<?php include 'shared/footer.php' ?>
</div>

<script>
  var slideIndex = 0;
  showSlides();
</script>

</body>
</html>
