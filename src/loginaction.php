<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel ="stylesheet" href="actionstyle.css"/>
</head>
<body>
<?php 

if (isset($_SESSION['user_email'])) {
  # code...

  echo  "<div class='message-box success'>ALREADY LOGGED IN </div>";
  exit;
  
}


$conn = new mysqli("localhost", "amit", "amit","result_management");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$mail=$_POST["mail"];
?><br>
<?php
$password =$_POST["pass"];
 ?><br> 
<?php
$sql= "SELECT mail FROM user WHERE mail='{$mail}' AND password='{$password}'";
$result= $conn->query($sql);
if ($result->num_rows==1) {

session_start();
$_SESSION['user_email']=$mail;
    echo  "<div class='message-box success'>LOGIN SUCCESSFULLY</div>";

    header ("location:index.php");
    exit;
}
else {
   echo "<div class= 'message-box error'>WRONG CREDENTIALS</div> "; 
}
?>
</body>
</html>










