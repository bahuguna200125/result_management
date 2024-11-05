<?php require_once("../controller/user_controller.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel ="stylesheet" href="../assets/css/actionstyle.css"/>


</head>
<body>
<?php 




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];


    $controller= new UserController();
    $user = $controller->authenticate_user($mail,$pass);
    if ($user) {
        $_SESSION['user_email'] = $mail;
        $_SESSION['user_id'] = $user->get_user_id();
        $_SESSION['first_name'] = $user->get_first_name(); 
        $_SESSION['last_name'] = $user->get_last_name(); 
        $_SESSION['admin']=$user->get_admin();

        header("Location: ../index.php");
        exit();
    } else {
        echo "<div class='message-box error'>Invalid email or password.</div>";
    }
}
?>


</body>
</html>










