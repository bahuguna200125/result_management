<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
session_destroy();
echo "YOU ARE SUCCESSFULLY LOGGED OUT <a href='login.php'>LOGIN<a/> or <a href='register.php'>REGISTER<a/> ";
header ("location:index.php");
exit;
?>
</body>
</html>