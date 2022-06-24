<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Crowdfunding</title>
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

  if(!isset($_SESSION["login"])){
    echo "<div id='site_content'>";

    echo "<div id='sidebar_container'>";
    echo "<a class='linkprofilo' href='index.php'> Homepage </a>";
    echo "<a class='linkprofilo' href='signin.php'> Login </a>";
    echo "<a class='linkprofilo' href='signup.php'> Register to our website </a>";
    echo "</div>";

    echo "<div id='content'>\n";
    echo "<h1> We appreciate that you want to help us, but you have to be logged. If you are not registered, join us now! </h1>";
    echo "</div>\n";

    echo "</div>";
    echo "</div>";
    include 'shared/footer.php';
    echo "</body>";
    echo "</html>";
    exit();
  }

  ?>
  <div id="site_content">

    <div id="sidebar_container">
      <h4>COMPLETE PRIVACY</h4>
      <h5>We will not save your credit card info</h5>
      <a class='linkprofilo' href='crowdfunding.php'> Go back </a>
    </div>


    <div id="content">

      <div id="form-zone">

        <form id="cardform" action="processpayment.php" method="POST">
        <h1>Procede to pay:</h1>

        <div class="forms">
          <input type="text" required id="owner" name="owner" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" title="Insert a valid name">
          <label> Owner: </label>
        </div>

        <div class="forms">
          <input type="text" required id="cardNumber" name="cardNumber" pattern="^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$|^3[47][0-9]{13}$|^4[0-9]{12}(?:[0-9]{3})?$" title="we accept visa,mastercard and american express credit cart">
          <label> Credit card number: </label>
        </div>

        <div class="forms">
          <input type="text" required id="cvv" name="cvv" pattern="[0-9]{3}" title="Cvv must be three digit">
          <label> CVV: </label>
        </div>

        <div class="forms">
            <select name='month'>
                <option value="1">January</option>
                <option value="2">February </option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select name='year'>
                <option value="22"> 2022</option>
                <option value="23"> 2023</option>
                <option value="24"> 2024</option>
                <option value="25"> 2025</option>
                <option value="26"> 2026</option>
                <option value="27"> 2027</option>
                <option value="28"> 2028</option>
                <option value="29"> 2029</option>
                <option value="30"> 2030</option>
            </select>
        </div>

            <input id="5" type="radio" name="amount" value="5">
            <label for="5"> 5$ </label><br>
            <input id="10" type="radio" name="amount" value="10">
            <label for="10"> 10$ </label><br>
            <input id="25" type="radio" name="amount" value="25">
            <label for="25"> 25$ </label><br>
            <input id="50" type="radio" name="amount" value="50">
            <label for="50"> 50$ </label><br>
            <input id="100" type="radio" name="amount" value="100">
            <label for="100"> 100$ </label><br>
            <input id="1000" type="radio" name="amount" value="1000">
            <label for="1000"> 1000$ </label><br>

        <div class="forms" id="credit_cards">
            <img src="images/visa.png" alt="Visa logo" id="visa">
            <img src="images/mastercard.png" alt="Mastercard logo" id="mastercard">
            <img src="images/amex.png" alt="American express logo" id="amex">
        </div>

        <div class= "submit" id="paynow"><input type="submit" name="submit" value="Confirm payment"></div>
        </form>
      </div>
    </div>
  </div>
  <?php include 'shared/footer.php' ?>
</div>

</body>

</html>
