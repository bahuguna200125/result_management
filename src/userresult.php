
<?php 

function showresult($user_id ,$conn){
  

    $result_query = "SELECT * FROM user_result WHERE user_id = $user_id";
    $result = $conn->query($result_query);

    if ($result->num_rows > 0) {
        echo "<h2>Your Result:</h2>";
        while ($row = $result->fetch_assoc()) {
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

 $hindi =$row['hindi'];
 echo $hindi ;
?></b><br></td>
</tr>
<tr>
   
    <td>English</td>
    <td>100</td>
    <td><b><?php

$english =$row['english'];
echo $english;
?><br></td>
</tr> 

<tr>
    
    <td>Maths</td>
    <td>100</td>
    <td><b><?php
$maths= $row['maths'];
echo $maths;
?></b><br></td>
</tr>
<tr>
    
    <td>Physics</td>
    <td>100</td>
    <td><b><?php
 $physics =$row['physics'];
echo $physics;
?></b><br></td>
</tr>
<tr>
    
    <td>Chemistry</td>
    <td>100</td>
    <td> <b><?php
$chemistry= $row['chemistry'];
echo $chemistry;
?><br></td>
</tr><br><br>
<tr>
<td>TOTAL MARKS</td>
<td>500</td>
<td> <b><?php

 function totalmarks($arrayofsub){
    return $arrayofsub['hindi']+  $arrayofsub['english'] +  $arrayofsub['maths'] +  $arrayofsub['physics']+ $arrayofsub['chemistry'];
  }
 
$total=totalmarks($row);
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
    if ($row[$subject] < 33) {
        $fail = true;
        $total_fail_sub++;
        $fail_sub_marks = $row[$subject];
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
  
  $sql2 = "SELECT mail FROM user WHERE user_id = $user_id";
  $email_result = $conn->query($sql2);
  if ($email_result->num_rows > 0) {
      $email_row = $email_result->fetch_assoc();
      echo $email_row['mail'];
  }
  
?></b><br></td> 
</tr> 


                            </td>
                        </tr>
                    </table>
                </div>
            </form>
<?php
        }
    } else {
        echo "<p>No results available for this user.</p>";
    }
}?>