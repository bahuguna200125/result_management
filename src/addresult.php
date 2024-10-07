<?php
 require "controller/user_controller.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addresult.css"/>
    <link rel="stylesheet" href="header.css"/>
</head>
<body>
<?php include("header.php")?>
<div class="breadcrumb">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="addresult.php">Add Result</a></li>
        </ul>
    </div>

<div class="addresult">
<?php
    $admin = 0;
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
        $current_page = basename($_SERVER['PHP_SELF']);
        if (isset($_SESSION['user_email'])) {
            $user_email = $_SESSION['user_email'];
            $controller = new UserController();
            $user = $controller->get_user_by_mail ($user_email);
            if ($user){
                $first_name = $user->get_first_name();
                $admin = $user->get_admin();
                $user_id = $user->get_user_id(); 
              
            }
            else {
                echo "User Not Found"."<br>";
            }

            }
        }
    
    ?>
<?php if ($admin == 1) { ?>
            <div class="admin-page">

                <div class="admin-section add-result">
                    <h3>Add Result</h3>
                    <?php include "result.php"; ?>
                </div>
<?php } ?>
</div>
</body>
</html>