<?php include "connection.php";
include("header.php");?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="/result-management/src/assets/css/style.css"/>
</head>
<body>
<form method="post" action="loginaction.php" id="form2">
<label for="mail"><h4>ENTER YOUR MAIL ID</h4> </label>
       <input type="email" id="mail" name="mail" placeholder="@gmail.com" value=""><br>
       <div id="mail_info"></div>
       <label for="pass"><h4>PASSWORD</h4></label>
       <input type="password" id="pass" name="pass" placeholder="PASSWORD" value=""><br>
       <div id="pass_info"></div><br>
       <input type="submit"  id="submit" onclick="myFunction();" name="LOGIN" value="LOGIN"> 
    
</form> 
</body>
</html>