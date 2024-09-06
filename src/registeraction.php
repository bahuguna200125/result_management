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

$conn = new mysqli("localhost", "amit", "amit","result_management");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$firstname=$_POST["fname"];
?>
<br>
<?php
if ($_POST["fname"]=="") {
   echo "<div class='message-box warning'>PLEASE ENTER FIRST NAME</div>";
}

?><br>
<?php 
$lastname=$_POST["lname"];
// echo $lastname;
?><br>
<?php
if ($_POST["lname"]=="") {
    echo "<div class='message-box warning'>PLEASE ENTER LAST NAME </div>";
 }

 ?><br>
<?php 
$mail=$_POST["mail"];
// echo $mail;
?><br>
<?php
if ($_POST["mail"]=="") {
    echo "<div class='message-box warning'>PLEASE ENTER MAIL ID</div>";
 }
 
 ?><br>
 <?php
 $mobile_no= $_POST["phone"];
// echo $mobile_no;
?><br>
<?php
if ($_POST["phone"]=="") {
    echo "<div class='message-box warning'>PLEASE ENTER PHONE NUMBER</div>";
 }

 ?><br>
<?php 
$pass= $_POST["cpass"];
// echo $pass;
?><br>
<?php
if ($pass=="") {
    echo "<div class='message-box warning'>PLEASE ENTER PASSWORD</div>";
 }
?><br>
<?php 
$confirmpass=$_POST["conpass"];
// echo $confirmpass;
?><br>
<?php
if ($confirmpass=="") {
    echo "<div class='message-box warning'>PLEASE ENTER CONFIRM PASS</div>";
 }
 ?><br>
 <?php
 if ($pass!=$confirmpass) {
    echo "<div class='message-box warning'>PLEASE ENTER SAME PASSWORD</div>";
 }
$sql2= "SELECT mail FROM user WHERE mail='{$mail}' ";
$result= $conn->query($sql2);
if ($result->num_rows>=1) {
  echo "<div class='message-box error'>USER ALREADY EXIST</div>";
  exit;
}
  $sql= "INSERT INTO user (`fname` ,`lname`,`mail`,`phone_no` ,`password`) VALUES ('{$firstname}','{$lastname}','{$mail}','{$mobile_no}','{$pass}')";
 $result= $conn->query($sql);
if ($result) {
   echo  "<div class='message-box success'>REGISTRATION SUCCESSFULLY <a href='login.php'>LOGIN<a/></div> ";
}
else {
    echo  "<div class='message-box error'>REGISTRATION FAILED</div>";
}

?>
</body>
</html>
