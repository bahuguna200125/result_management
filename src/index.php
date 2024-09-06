<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel ="stylesheet" href="indexstyle.css"/> -->
</head>
<body>
 <?php
 session_start();
 $conn = new mysqli("localhost", "amit", "amit","result_management");
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }

$admin=0;
if (isset($_SESSION['user_email'])) {

    $user_email=$_SESSION['user_email'];

   $sql= "SELECT * FROM user WHERE  mail='{$user_email}'";
   $result= $conn->query($sql);
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["fname"];
        $admin=$row["admin"];
       
    }
}
    
  }
  else {
  echo " PLEASE LOGIN/ REGISTER ";
  }
  ?>
  <?php
  if (isset($_SESSION['user_email'])) {
    ?>
    <div class="header"> 
    <div id ="home"><a href= 'index.php'>HOME</a> </div>
    <div id ="logout"><a href= 'logout.php'>LOG OUT</a> </div>
    </div>
    <?php
  }
else {
    ?>
    <div class="header"> 
    <div id ="home"><a href= 'index.php'>HOME</a> </div>
    <div id ="login"><a href= 'login.php'>LOG IN</a> </div>
    <div id ="register"><a href= 'register.php'>REGISTER</a> </div>
    </div>
    <?php
}
?>
<?php
if($admin==1){
    echo "welcome to admin section";
    include "result.php";
}
?>
    
</body>
</html>