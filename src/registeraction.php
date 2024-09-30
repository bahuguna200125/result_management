<?php include("connection.php")?>
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


$register_action="";

if (isset($_POST["register_action"])) {

$register_action=$_POST["register_action"];

}



if ($register_action=="edit") {

   $user_id = $_POST ["user_id"];
 $sql = "UPDATE result_management.user
 SET fname='{$firstname}', lname='{$lastname}', mail='{$mail}', phone_no='{$mobile_no}', 
 password ='{$pass}' WHERE user_id =$user_id";
 
$conn->query($sql);
header("location:index.php");
}


else{
  $sql= "INSERT INTO user (`fname` ,`lname`,`mail`,`phone_no` ,`password`) VALUES ('{$firstname}','{$lastname}','{$mail}','{$mobile_no}','{$pass}')";
 $result= $conn->query($sql);}
if ($result) {
   echo  "<div class='message-box success'>REGISTRATION SUCCESSFULLY <a href='login.php'>LOGIN<a/></div> ";
}
else {
    echo  "<div class='message-box error'>REGISTRATION FAILED</div>";
}

?>

</body>
</html>
