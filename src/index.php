<?php 
include "connection.php"; 
 require "userresult.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="indexstyle.css" />
    <link rel="stylesheet" href="manageresult.css"/>
</head>
<body>
    <?php
    $admin = 0;
    $user_logged_in = false;
    $current_page = basename($_SERVER['PHP_SELF']);

    // Check if user is logged in
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
        $sql = "SELECT * FROM user WHERE mail='{$user_email}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $first_name = $row['fname'];
                $admin = $row['admin'];
                $user_id = $row['user_id']; // Make sure user_id is set only when the user is logged in
                $user_logged_in = true;
            }
        }
    }
    ?>

    <div class="header">
        <div id="home">
            <a href='index.php'>HOME</a>
        </div>

        <?php if (!$user_logged_in) { ?>
            <div id="register">
                <a href='register.php'>REGISTER</a>
            </div>
        <?php } ?>

        <div id="logout">
            <?php if ($user_logged_in) { ?>
                <a href='logout.php'>LOG OUT</a>
            <?php } else { ?>
                <a href='login.php'>LOG IN</a>
            <?php } ?>
        </div>
    </div>

    <?php if ($user_logged_in) { ?>
        <div class="admin-header">
            <h1>Welcome, <?php echo $first_name; ?>!</h1>
        </div>

        <?php if ($admin == 1) { ?>
            <div class="admin-page">
                <div class="admin-section add-result">
                    <h3>Manage Result</h3>
                    <a href="addresult.php">ADD RESULT</a><br>
                    <a href="showresults.php">SHOW RESULT</a>
                    <h3>Manage User</h3>
                    <a href="users.php">EDIT USERS</a>
                </div>
            </div>
        <?php } else { 
          showresult($user_id,$conn);?>
            </div>
        <?php } ?>
    <?php } else if ($current_page !== 'login.php') { ?>
        <div class="container">
            <h2>PLEASE LOGIN/REGISTER</h2>
            <a href="login.php">LOGIN</a>
            <a href="register.php">REGISTER</a>
        </div>
    <?php } ?>
</body>
</html>
