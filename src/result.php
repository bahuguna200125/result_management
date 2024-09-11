 <form method="post" action="resultaction.php">
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
<td><input type="number" name="hin" value=""></td>

</tr>
<tr>
    <td>English</td>
    <td>100</td>
    <td><input type="number" name="eng" value=""></td>
</tr>
<tr>
    <td>Maths</td>
    <td>100</td>
    <td><input type="number" name="math" value=""></td>
</tr>
<tr>
    <td>Physics</td>
    <td>100</td>
    <td><input type="number" name="phy" value=""></td>
</tr>
<tr>
    <td>Chemistry</td>
    <td>100</td>
    <td><input type="number" name="che" value=""></td>
</tr>
<!-- <tr>
    <td>TOTAL MARKS</td>
    <td>500</td>
    <td></td>
</tr>

<tr>
    <td>PERCENTAGE</td>
    <td>%</td>
    <td></td>

</tr>
<tr>
    <td>PASS/FAIL</td>
    <td>PASS WITH GRACE</td>
    <td></td> -->

<!-- </tr> -->
<tr>
    <td></td>
    <td>USER MAIL </td>
    <td> <lable for ="user_mail">SELECT MAIL</lable> 
    <select name="user_id" id="user_mail">

    <?php $sql2 = "SELECT mail, user_id FROM user WHERE user.admin!=1 AND NOT EXISTS (SELECT * FROM user_result WHERE user.user_id=user_result.user_id )";
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