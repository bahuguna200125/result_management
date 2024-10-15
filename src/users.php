<?php
    session_start(); 
    if (!isset($_SESSION['user_email'])) {
       
        header("Location: login.php");
        exit;
    }
    include "header.php"; 
    require_once("controller/user_controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="manageusers.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
<div class="breadcrumb">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="users.php">Users</a></li>
        </ul>
    </div>
    <div class="users">
    <?php
       $controller= new UserController();
       $users = $controller->get_users();
       if ($users) {
            echo "<h2>USER DETAILS:</h2>";
            echo "<table>";
            echo "<tr><th>USER ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>EMAIL</th><th>PHONE NO</th><th>ACTION</th></tr>";
            foreach ($users as $user) {
                $userid=$user->get_user_id();
                $fname= $user->get_first_name();
                $lname= $user->get_last_name();
                $mail= $user->get_email();
                $phone_no=$user->get_phone_no();
                echo "<tr>";
                echo "<td>{$userid}</td>";
                echo "<td>{$fname}</td>";
                echo "<td>{$lname}</td>";
                echo "<td>{$mail}</td>";
                echo "<td>{$phone_no}</td>";
                echo "<td><a href='edit_user.php?user_id={$userid}'>EDIT</a> <a href='delete.php?user_id={$userid}'>DELETE</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results available.</p>";
        }
    ?>
    </div>
</body>
</html>
