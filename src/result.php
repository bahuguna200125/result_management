 <form method="post" action="resultaction.php" id="addresult" onsubmit="return validateResultForm()">
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
<td><input type="number"  id= "hin"  name="hin" value=""> <div id="hindi_info"></div></td>


</tr>
<tr>
    <td>English</td>
    <td>100</td>
    <td><input type="number" id="eng" name="eng" value=""> <div id="english_info"></div> </td>
    
</tr>
<tr>
    <td>Maths</td>
    <td>100</td>
    <td><input type="number" id="math" name="math" value="">
    <div id="maths_info"></div> </td>
   
</tr>
<tr>
    <td>Physics</td>
    <td>100</td>
    <td><input type="number" id="phy" name="phy" value="">    <div id="physics_info"></div> </td>
 

</tr>

<tr>
    <td>Chemistry</td>
    <td>100</td>
    <td><input type="number" id="che" name="che" value=""> <div id="chemistry_info"></div></td>
    
</tr>
<tr>
    <td></td>
    <td>USER MAIL </td>
    <td> <lable for ="user_mail">SELECT MAIL</lable> 
    <select name="user_id" id="user_mail">

    
    <?php
    $controller = new UserController();
    $users = $controller->add_user_result();

    foreach($users as $user){
        $email= $user->get_email();
        $user_id= $user->get_user_id();
        echo "<option value='{$user_id}'>{$email}</option>";

    }
            ?>


    </select>
 </td> 
</tr>
<tr>
    <td></td>
    <td></td>
    <td> <input type="submit"  id="btn"   value="SUBMIT"></td>

</tr>


    </table>
   
</div>

</form>