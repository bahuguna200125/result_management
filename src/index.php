<?php 
 require "/var/www/html/result-management/src/view/userresult.php";
 require "controller/user_controller.php";?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/result-management/src/assets/css/indexstyle.css" />
    <link rel="stylesheet" href="/result-management/src/assets/css/manageresult.css"/>
</head>
<body>
    <?php
    $admin = 0;
    $user_logged_in = false;
    $current_page = basename($_SERVER['PHP_SELF']);
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
        $controller = new UserController();
        $user = $controller->get_user_by_mail ($user_email);
        if ($user){
            $first_name = $user->get_first_name();
            $admin = $user->get_admin();
            $user_id = $user->get_user_id(); 
            $user_logged_in = true;
        }
        else {
            echo "User Not Found"."<br>";
        }
        
            }
     
    ?>

    <div class="header">
        <div id="home">
            <a href='/result-management/src/index.php'>HOME</a>
        </div>

        <?php if (!$user_logged_in) { ?>
            <div id="register">
                <a href='/result-management/src/view/register.php'>REGISTER</a>
            </div>
        <?php } ?>

        <div id="logout">
            <?php if ($user_logged_in) { ?>
                <a href='/result-management/src/view/logout.php'>LOG OUT</a>
            <?php } else { ?>
                <a href='/result-management/src/view/login.php'>LOG IN</a>
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
                    <a href="/result-management/src/view/addresult.php">ADD RESULT</a><br>
                    <a href="/result-management/src/view/showresults.php">SHOW RESULT</a>
                    <h3>Manage User</h3>
                    <a href="/result-management/src/view/users.php">EDIT USERS</a>
                </div>
            </div>
        <?php } else { 
          showresult($user_id,$conn);?>
            </div>
        <?php } ?>
    <?php } else if ($current_page !== 'login.php') { ?>
        <div class="container">
            <h2>PLEASE LOGIN/REGISTER</h2>
            <a href="/result-management/src/view/login.php">LOGIN</a>
            <a href="/result-management/src/view/register.php">REGISTER</a>
        </div>
    <?php } ?>
</body>
</html>
