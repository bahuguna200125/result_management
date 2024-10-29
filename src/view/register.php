<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="/result-management/src/assets/css/style.css"/>
    
</head>
<body>
                               
<form method="post" action="registeraction.php" id="register_form" onsubmit="return registerValidation();">
<input type="hidden" name="register_action" value="register">
        <label for="fname" ><h4>FIRST NAME</h4></label>
        <input type="text" id="fname" name="fname" placeholder="FIRST NAME" value="">  <br>
        <div id="fname_info"></div>
        <label for="lname" ><h4>LAST NAME</h4></label>
        <input type="text" id="lname" name="lname" placeholder="LAST NAME" value=""> <br>
        <div id="lname_info"></div>
       
       <label for="mail"><h4>ENTER YOUR MAIL ID</h4> </label>
       <input type="email" id="mail" name="mail" placeholder="@gmail.com" value=""><br>
       <div id="mail_info"></div>
   
       <label for="phone"><h4>PHONE NUMBER</h4></label>
       <input type="number" id="phone" name="phone" placeholder="CONTACT INFO" value=""> <br>
       <div id="phone_info"></div>
     
       <label for="cpass"><h4>CREATE PASSWORD</h4></label>
       <input type="password" id="cpass" name="cpass" placeholder="CREATE PASSWORD" value=""><br>
       <div id="cpass_info"></div>
     
       <label for="conpass"><h4>CONFIRM PASSWORD</h4></label>
       <input type="password" id="conpass" name="conpass" placeholder="CONFIRM PASSWORD" value=""> <br><br>
       <div id="conpass_info"></div>
       <div id="samepass_info"></div>
       <input type="submit"  id="submit"  name="submit" value="submit">
    </form> 
    <script src="/result-management/src/assets/js/register.js"></script>
</body>
</html>