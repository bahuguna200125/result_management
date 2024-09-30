<?php include("connection.php")?>
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


  
 
 $result= "DELETE FROM user_result WHERE user_id=$userid;";
 $delete2 = $conn->query($result);


 header("location:showresults.php");

  ?>

</body>
</html>