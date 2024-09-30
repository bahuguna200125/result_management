<?php
    session_start(); 
    if (!isset($_SESSION['user_email'])) {
       
        header("Location: login.php");
        exit;
    }
    include "header.php"; 
    include("connection.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
    <?php
        // Fetch user details from the database
        $user_query = "SELECT user_id, fname, lname, mail, phone_no FROM user";
        $user = $conn->query($user_query);
        
        if ($user->num_rows > 0) {
            echo "<h2>USER DETAILS:</h2>";
            echo "<table>";
            echo "<tr><th>USER ID</th><th>FIRST NAME</th><th>LAST NAME</th><th>EMAIL</th><th>PHONE NO</th><th>ACTION</th></tr>";
            
            while ($row = $user->fetch_assoc()) {
                $userid = $row['user_id'];
                echo "<tr>";
                echo "<td>{$userid}</td>";
                echo "<td>{$row['fname']}</td>";
                echo "<td>{$row['lname']}</td>";
                echo "<td>{$row['mail']}</td>";
                echo "<td>{$row['phone_no']}</td>";
                echo "<td><a href='edit_user.php?user_id={$userid}'>EDIT</a> <a href='delete.php?user_id={$userid}'>DELETE</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results available.</p>";
        }
    ?>
</body>
</html>
