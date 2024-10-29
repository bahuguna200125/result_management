<?php require_once("../controller/user_controller.php");
include("header.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel ="stylesheet" href="/result-management/src/assets/css/actionstyle.css"/>
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





$register_action="";

if (isset($_POST["register_action"])) {

$register_action=$_POST["register_action"];

}
$controller = new UserController();
$user = $controller->get_user_by_mail ($mail);
if ($register_action=="register" && $user) {

 echo "USER ALREADY EXIST";
   

   exit;

}


if ($register_action=="edit") {
   $user_id = $_POST ["user_id"];

   $user = new User($user_id,$firstname,$lastname,$mail,$mobile_no,$pass,0);


   

   $result = $controller->edit_user($user,);
   if ($result) {
      header("location:users.php");
   }
   else {
       echo  "<div class='message-box error'>UPDATE FAILED</div>";
   }
header("location:users.php");
}


else{
   $user = new User(0,$firstname,$lastname,$mail,$mobile_no,$pass,0);

$result = $controller->insert_user($user);
}
if ($result) {
   echo  "<div class='message-box success'>REGISTRATION SUCCESSFULLY <a href='login.php'>LOGIN<a/></div> ";
}
else {
    echo  "<div class='message-box error'>REGISTRATION FAILED</div>";
}

?>

</body>
</html>
