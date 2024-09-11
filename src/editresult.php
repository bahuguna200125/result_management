<?php include "connection.php"; ?>
<?php

$user_id = $_POST['user_id'];
            $result_query = "SELECT * FROM user_result WHERE user_id = $user_id";
            $result = $conn->query($result_query);
            if ($result->num_rows > 0) {

                echo "<h2>Your Results:</h2>";
                while ($row = $result->fetch_assoc()) {
                  ?>
                
                    <form method="post" action="resultaction.php" >
                        <input type="hidden" name="result_action" value="edit">
                        <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
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
                <td><input type="number" name="hin" value="<?php echo $row['hindi'];?>"></td>
                
                </tr>
                <tr>
                    <td>English</td>
                    <td>100</td>
                    <td><input type="number" name="eng" value="<?php echo $row['english'];?>"></td>
                </tr>
                <tr>
                    <td>Maths</td>
                    <td>100</td>
                    <td><input type="number" name="math" value="<?php echo $row['maths'];?>"></td>
                </tr>
                <tr>
                    <td>Physics</td>
                    <td>100</td>
                    <td><input type="number" name="phy" value="<?php echo $row['physics'];?>"></td>
                </tr>
                <tr>
                    <td>Chemistry</td>
                    <td>100</td>
                    <td><input type="number" name="che" value="<?php echo $row['chemistry'];?>"></td>
                </tr>
                <!-- <tr> -->
                    <!-- <td>TOTAL MARKS</td>
                    <td>500</td>
                  <td> <?php //echo $row['total_marks']; ?></td> 
                </tr>
                
                <tr>
                    <td>PERCENTAGE</td>
                    <td>%</td>
                    <td><?php //echo $row['percent']; ?></td>
                
                </tr>
                <tr>
                    <td>PASS/FAIL</td>
                    <td>PASS WITH GRACE</td>
                    <td><?php //echo $row['result_status'];?></td>
                
                </tr> -->
                <tr>
                    <td></td>
                    <td>USER MAIL </td>
                    <td> <lable for ="user_mail" name="user_id" id="user_mail"></lable> 
                      
                
                    <?php $sql2 = "SELECT mail, user_id FROM user WHERE user_id=$user_id";
                            $result = $conn->query($sql2); 
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $email = $row['mail'];
                                    $user_id = $row['user_id']; 
                                    //echo $email;
                                    //echo $user_id;
                                    echo $email;
                                    
                                
                                }        
                            }
                
                          
                ?>
            
                 </td> 
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> <input type="submit"  id="btn" value="SUBMIT"></td>
                
                
                </tr>
        
        
            </table>
           
        </div>
        
        </form>
             <?php
               
            }
        }
        ?>