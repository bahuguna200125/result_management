<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="indexstyle.css" />
</head>

<body>
    <?php
    $admin = 0;
    $user_logged_in = false;
    $current_page = basename($_SERVER['PHP_SELF']);

    if (isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
        $sql = "SELECT * FROM user WHERE mail='{$user_email}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $first_name = $row['fname'];
                $admin = $row['admin'];
                $user_id = $row['user_id'];
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
                    <h3>Add Result</h3>
                    <?php include "result.php"; ?>
                </div>


                <div class="admin-section edit-result">
                    <h3>Edit Result</h3>
                    <form method="post" action="editresult.php">
                        <label for="user_mail">Select Mail</label>
                        <select name="user_id" id="user_mail">
                            <?php $sql2 = "SELECT mail, user_id FROM user WHERE user.admin!=1 AND EXISTS (SELECT * FROM user_result WHERE user.user_id=user_result.user_id )";
                            $result = $conn->query($sql2);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $email = $row['mail'];
                                    $user_id = $row['user_id'];
                                    //echo $email;
                                    //echo $user_id;
                                    echo "<option value='{$user_id}'>{$email}</option>";


                                }
                            }

                            ?>


                        </select>
                        <input type="submit" value="Submit">
                        </form>

                </div>


                <div class="admin-section edit-user">
                    <h3>Edit User</h3>
                    <form method="post" action="edit_user.php">
                        <label for="user_mail">Select Mail</label>
                        <select name="user_id" id="user_mail">
                            <?php $sql2 = "SELECT mail, user_id FROM user WHERE user.admin!=1";
                            $result = $conn->query($sql2);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $email = $row['mail'];
                                    $user_id = $row['user_id'];
                                    //echo $email;
                                    //echo $user_id;
                                    echo "<option value='{$user_id}'>{$email}</option>";


                                }
                            }

                            ?>


                        </select>



                        <input type="submit" value="Submit">
                    </form>
                </div>


            <?php } else { ?>



                <div class="user-results">
                    <?php
                    $result_query = "SELECT * FROM user_result WHERE user_id = '{$user_id}'";
                    $result = $conn->query($result_query);
                    if ($result->num_rows > 0) {
                        echo "<h2>Your Results:</h2>";
                        echo "<table>";
                        echo "<tr><th>Subject</th><th>Total Marks</th><th>Marks Obtained</th></tr>";
                        while ($row = $result->fetch_assoc()) {



                            echo "<tr>";
                            echo "<td>Hindi</td><td>100</td><td>{$row['hindi']}</td>";
                            echo "</tr><tr>";
                            echo "<td>English</td><td>100</td><td>{$row['english']}</td>";
                            echo "</tr><tr>";
                            echo "<td>Maths</td><td>100</td><td>{$row['maths']}</td>";
                            echo "</tr><tr>";
                            echo "<td>Physics</td><td>100</td><td>{$row['physics']}</td>";
                            echo "</tr><tr>";
                            echo "<td>Chemistry</td><td>100</td><td>{$row['chemistry']}</td>";
                            echo "</tr><tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>No results available.</p>";
                    }
                    ?>
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