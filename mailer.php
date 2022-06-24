<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Mailing system</title>
    <link rel="stylesheet" type="text/css" href="style/sitestyle.css" />
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
      echo "<h1> YOU ARE NOT LOGGED </h1>";
      echo "</div>\n";
      echo "</div>\n";
      echo "</body>";
      echo "</html>";
      exit();
    }

    include 'shared/database.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    $newsletter_users = "SELECT firstname,lastname,email FROM users WHERE newsletter=1";
    $result = mysqli_query($conn, $newsletter_users);
    while ($row = mysqli_fetch_object($result)){
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Mailer = "smtp";

      //$mail->SMTPDebug = 2;
      $mail->SMTPAuth   = true;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;
      $mail->Host       = "smtp.gmail.com";
      include 'reserved/mailaccount.php';

      $mail->IsHTML(true);
      $mail->addAddress($row->email);
      $mail->setFrom($_SESSION['email']);
      $mail->addReplyTo("thestartplanet@gmail.com");
      $mail->Subject = $_POST['subject'];
      $mail->Body = $_POST['mail'];

      if(!$mail->send()){
        echo "<h1>Mailer Error: " . $mail->ErrorInfo . "</h1>\n";
        echo "</div>\n";
        echo "</body>\n";
        echo "</html>\n";
        header("Refresh:3; url=newsletter_form.php");
        exit();
      }
    }
    echo "<div id='site_content'>\n";
    echo "<h1>Mail sent to all the subs of our newsletter!</h1>\n";
    echo "</div>\n";
    mysqli_close($conn);
    header("Refresh:2; url=mail.php");
  ?>

  </div>

  <?php include 'shared/footer.php' ?>

</body>
</html>
