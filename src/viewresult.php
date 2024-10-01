<?php include "connection.php"; ?>
<?php include "header.php"; ?>
<?php require"userresult.php"?>;

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="manageresult.css">
</head>
<body>

<?php
if (isset($_GET['user_id'])) {
    $user_id = (int)$_GET['user_id'];
    showresult($user_id ,$conn);
} else {
    echo "<p>No user selected.</p>";
}
?>
    
    </body>
</html>