<?php require_once("controller/user_controller.php");?>
<?php include "header.php"; ?>
<?php require "userresult.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="manageresult.css">
</head>
<body>
<?php include "admin_page.php";?>
<div class="breadcrumb">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="showresults.php">Show Result</a></li>
            <li><a href="viewresults.php">View Result</a></li>
        </ul>
    </div>
<div class="result">
<?php
if (isset($_GET['user_id'])) {
    $user_id = (int)$_GET['user_id'];
    showresult($user_id ,$conn);
} else {
    echo "<p>No user selected.</p>";
}
?>
</div>
    
    </body>
</html>