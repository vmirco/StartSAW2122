<?php
  include "shared/database.php";

  $email = trim($_POST['email']);
  $email =  mysqli_real_escape_string($conn, $email);

  $query = mysqli_prepare($conn, "SELECT * FROM users WHERE email=?");
  mysqli_stmt_bind_param($query, 's', $email);

  if(mysqli_stmt_execute($query)){
    $result = mysqli_stmt_get_result($query);
    if(mysqli_num_rows($result) > 0) {
      echo "nogood";
    }
    else {
      echo "good";
    }
  }
  else {
    echo "nogood";
  }

  mysqli_stmt_close($query);
  mysqli_close($conn);
?>
