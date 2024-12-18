<?php
 include "header.php"; 
require "../controller/user_controller.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../assets/css/style.css"/>
</head>
<body>
<?php include "admin_page.php";?>
<div class="breadcrumb">
        <ul class="breadcrumb">
            <li><a href="../index.php">Home</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="edit_user.php">Edit User</a></li>
        </ul>
    </div>
<?php
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

$controller = new UserController();

$user = $controller->get_user_by_id($user_id);


if ($user){
    $email = $user->get_email();
    $fname = $user->get_first_name();
    $lname = $user->get_last_name();
    $pass = $user->get_password();
    $phone_no = $user->get_phone_no();
?>

    <h2>Update Details</h2>
    <form method="post" action="registeraction.php">
        <input type="hidden" name="register_action" value="edit">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"><br><br><br><br>

        <label for="fname"><h4>First Name</h4></label>
        <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname; ?>"><br>

        <label for="lname"><h4>Last Name</h4></label>
        <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>"><br>

        <label for="mail"><h4>Email</h4></label>
        <input type="email" id="mail" name="mail" placeholder="Email" value="<?php echo $email; ?>"><br>

        <label for="phone"><h4>Phone Number</h4></label>
        <input type="text" id="phone" name="phone" placeholder="Phone Number" value="<?php echo $phone_no; ?>"><br>

        <label for="cpass"><h4>Password</h4></label>
        <input type="password" id="cpass" name="cpass" placeholder="Password" value="<?php echo $pass; ?>"><br>

        <label for="conpass"><h4>Confirm Password</h4></label>
        <input type="password" id="conpass" name="conpass" placeholder="Confirm Password" value="<?php echo $pass; ?>"><br>

        <input type="submit" id="submit" name="submit" value="Update">
    </form>
    <?php
}
else {
    echo "<p>User not found.</p>";
}

?>
   
       

        <?php
    } else {
        echo "<p>User not found.</p>";
    } 

?>


</body>
</html>
