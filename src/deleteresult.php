<?php require "controller/user_controller.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
  <?php
  $userid=   $_GET ['user_id'];


  
 
  $controller = new UserController();
  $controller-> delete_user_result ($userid);


 header("location:showresults.php");

  ?>

</body>
</html>