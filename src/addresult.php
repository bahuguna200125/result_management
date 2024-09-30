<?php include("connection.php")?>
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

<?php
    $admin = 0;
    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
        $sql = "SELECT * FROM user WHERE mail='{$user_email}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $first_name = $row['fname'];
                $admin = $row['admin'];
                $user_id = $row['user_id'];
               

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
</body>
</html>