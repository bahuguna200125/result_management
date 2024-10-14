
<?php 
function showresult($user_id ,$conn){
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


 
        echo "<h2>Your Result:</h2>";
?>
           
           <table>
        <tr>
           
            <th>SUBJECT</th>
            <th>TOTAL MARKS</th>
            <th> MARKS OBTAINED</th>
        </tr>

        <tr>

<td>Hindi</td>
<td>100</td>
<td><b><?php

 echo $hindi ;
?></b><br></td>
</tr>
<tr>
   
    <td>English</td>
    <td>100</td>
    <td><b><?php

echo $english;
?><br></td>
</tr> 

<tr>
    
    <td>Maths</td>
    <td>100</td>
    <td><b><?php

echo $maths;
?></b><br></td>
</tr>
<tr>
    
    <td>Physics</td>
    <td>100</td>
    <td><b><?php

echo $physics;
?></b><br></td>
</tr>
<tr>
    
    <td>Chemistry</td>
    <td>100</td>
    <td> <b><?php

echo $chemistry;
?><br></td>
</tr><br><br>
<tr>
<td>TOTAL MARKS</td>
<td>500</td>
<td> <b><?php

 function totalmarks($user_result){
    return $user_result->getSubjectMark("hindi")+  $user_result->getSubjectMark("english")+  $user_result->getSubjectMark("maths") +  $user_result->getSubjectMark("physics")+ $user_result->getSubjectMark("chemistry");
   
  }
 
$total=totalmarks($user_result);
echo $total;






 ?></b></td>
<tr>

    <td id="per" colspan="2">PERCENTAGE</td>

    
    <td><b>
<?php
     function percentage($totalmarks) {
        return ($totalmarks / 500) * 100;
    }

     $percent = percentage($total);
     echo $percent;


    ?>
</td>
</tr>
<tr>
<td id="per" colspan="2">STATUS</td>
    <td>
<?php
$fail = false;
$fail_sub_marks = 0;
$total_fail_sub = 0;

$subjects = ['hindi', 'english', 'maths', 'physics', 'chemistry'];

foreach ($subjects as $subject) {
    if ($user_result->getSubjectMark($subject) < 33) {
        $fail = true;
        $total_fail_sub++;
        $fail_sub_marks = $user_result->getSubjectMark($subject);
    }
}
$result_status = ""; 

if ($fail) {
    if ($total_fail_sub == 1 && $fail_sub_marks >= 25) {
        $result_status = "PASS WITH GRACE";
        echo $result_status;
    } else {
        $result_status = "FAIL";
        echo $result_status;
    }
} else {
    $result_status = "PASS";
    echo $result_status;
}
?>
</td>
</tr>

<tr>
<td></td>
<td>USER MAIL</td>
<td><b><?php
  
  
      echo $email;
  
  
?></b><br></td> 
</tr> 


                            </td>
                        </tr>
                    </table>
                </div>
            </form>
<?php
        
    } else {
        echo "<p>No results available for this user.</p>";
    }
}?>