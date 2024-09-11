<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel ="stylesheet" href="actionstyle.css"/>
</head>
<body>
<?php 
session_start();
$conn = new mysqli("localhost", "amit", "amit", "result_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM user WHERE mail='$mail' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_email'] = $mail;
        $_SESSION['user_id'] = $user['user_id']; // Set user_id in session
        $_SESSION['first_name'] = $user['fname']; // Optionally set first_name
        $_SESSION['last_name'] = $user['lname']; // Optionally set last_name
        header("Location: index.php");
        exit();
    } else {
        echo "<div class='message-box error'>Invalid email or password.</div>";
    }
}
?>


</body>
</html>










