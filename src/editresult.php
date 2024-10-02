<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Results</title>
    <link rel="stylesheet" href="manageresult.css"> 
</head>
<body>
    <?php include "connection.php"; ?>
    <?php include "header.php"; ?>
    <div class="breadcrumb">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="showresults.php">Show Result</a></li>
            <li><a href="editresults.php">Edit Result</a></li>
        </ul>
    </div>
    <div class="result">
    <?php
    if (isset($_GET['user_id'])) {
        $user_id = (int)$_GET['user_id']; // Sanitize user_id

        $result_query = "SELECT * FROM user_result WHERE user_id = $user_id";
        $result = $conn->query($result_query);

        if ($result->num_rows > 0) {
            echo "<h2>Edit Result:</h2>";
            while ($row = $result->fetch_assoc()) {
    ?>
                <form method="post" action="resultaction.php">
                    <input type="hidden" name="result_action" value="edit">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div id="result">
                        <table>
                            <tr>
                                <th>SUBJECT</th>
                                <th>TOTAL MARKS</th>
                                <th>MARKS OBTAINED</th>
                            </tr>
                            <tr>
                                <td>Hindi</td>
                                <td>100</td>
                                <td><input type="number" name="hin" value="<?php echo $row['hindi']; ?>"></td>
                            </tr>
                            <tr>
                                <td>English</td>
                                <td>100</td>
                                <td><input type="number" name="eng" value="<?php echo $row['english']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Maths</td>
                                <td>100</td>
                                <td><input type="number" name="math" value="<?php echo $row['maths']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Physics</td>
                                <td>100</td>
                                <td><input type="number" name="phy" value="<?php echo $row['physics']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Chemistry</td>
                                <td>100</td>
                                <td><input type="number" name="che" value="<?php echo $row['chemistry']; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>USER MAIL</td>
                                <td>
                                    <?php
                                    $sql2 = "SELECT mail FROM user WHERE user_id = $user_id";
                                    $email_result = $conn->query($sql2);
                                    if ($email_result->num_rows > 0) {
                                        $email_row = $email_result->fetch_assoc();
                                        echo $email_row['mail'];
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="submit" id="btn" value="SUBMIT"></td>
                            </tr>
                        </table>
                    </div>
                </form>
    <?php
            }
        } else {
            echo "<p>No results available for this user.</p>";
        }
    } else {
        echo "<p>No user selected.</p>";
    }
    ?>
    </div>
</body>
</html>
