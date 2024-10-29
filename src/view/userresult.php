
<?php 
function showresult($user_id ){
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
$total= $user_result->getTotalMarks();
echo $total;
 ?></b></td>
<tr>
    <td id="per" colspan="2">PERCENTAGE</td>
    <td><b>
<?php
   
     $percent = $user_result->getPercentage();
     echo $percent;


    ?>
</td>
</tr>
<tr>
<td id="per" colspan="2">STATUS</td>
    <td>
<?php
  $result_status= $user_result->resultStatus();
  echo $result_status;
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
<tr>
<td></td>
<td>ACTION</td>

<td><b></b>

<?php

if (isset($_SESSION['admin'])){
    $admin=$_SESSION['admin'];
    if($admin!=1) {?>
    
     <a href='view/save_excel.php?user_id=<?=$user_id?>'>Download</a>;

 <?php   }
    
  else {?>
    <a href='save_excel.php?user_id=<?=$user_id?>'>Download</a>
 <?php }
}?>
  
</b><br></td> 
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