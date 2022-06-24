<?php
$conn = mysqli_connect("localhost","S4868097","201do77m","S4868097"); /*Test server*/
//$conn = mysqli_connect("localhost","mirco","12345","dbprova"); /*Test locale*/
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>
