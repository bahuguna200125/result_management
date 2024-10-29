<?php include "header.php";
    require "../controller/user_controller.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Results</title>
    <link rel="stylesheet" href="/result-management/src/assets/css/manageresult.css"> 
</head>
<body>

  <?php include "admin_page.php";?>
    <div class="breadcrumb">
        <ul class="breadcrumb">
            <li><a href="/result-management/src/index.php">Home</a></li>
            <li><a href="showresults.php">Show Result</a></li>
            <li><a href="editresults.php">Edit Result</a></li>
        </ul>
    </div>
    <div class="result">
    <?php
    if (isset($_GET['user_id'])) {
        $user_id = (int)$_GET['user_id']; 

     $controller= new UserController();
     $user_result = $controller->get_user_result_by_user_id($user_id);
     if ($user_result){
        $id = $user_result->get_id();
        $user_id= $user_result->get_user()->get_user_id();
        $email = $user_result->get_user()->get_email();
        $hindi = $user_result->getSubjectMark("hindi");
        $english = $user_result->getSubjectMark("english");
        $maths = $user_result->getSubjectMark("maths"); 
        $physics = $user_result->getSubjectMark("physics");
        $chemistry = $user_result->getSubjectMark("chemistry");
     }
      
            echo "<h2>Edit Result:</h2>";
           
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
                                <td><input type="number" name="hin" value="<?php echo $hindi; ?>"></td>
                            </tr>
                            <tr>
                                <td>English</td>
                                <td>100</td>
                                <td><input type="number" name="eng" value="<?php echo $english; ?>"></td>
                            </tr>
                            <tr>
                                <td>Maths</td>
                                <td>100</td>
                                <td><input type="number" name="math" value="<?php echo $maths; ?>"></td>
                            </tr>
                            <tr>
                                <td>Physics</td>
                                <td>100</td>
                                <td><input type="number" name="phy" value="<?php echo $physics; ?>"></td>
                            </tr>
                            <tr>
                                <td>Chemistry</td>
                                <td>100</td>
                                <td><input type="number" name="che" value="<?php echo $chemistry; ?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>USER MAIL</td>
                                <td>
                                    <?php
                                   
                                        echo $email;
                                    
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
         else {
            echo "<p>No results available for this user.</p>";
        }
    
    ?>
    </div>
</body>
</html>
