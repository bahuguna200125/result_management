<?php include "connection.php"; ?>
<?php include "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="manageresult.css">
</head>
<body>
<div class="breadcrumb">
<ul class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li><a href="addresult.php">Add Result</a></li>
    <li><a href="resultaction.php">Added Result</a></li>
</ul>
</div>
<?php


if($_POST['hin']<0||$_POST['hin']>100  && is_numeric($_POST['hin'])  ){
   echo "Wrong Input in Hindi";
exit;
}

 
if($_POST['eng']<0||$_POST['eng']>100){
    echo "Wrong Input in English";  
exit;
}
if($_POST['math']<0||$_POST['math']>100){
    echo "Wrong Input in Maths";
 exit;

}
if($_POST['phy']<0||$_POST['phy']>100){
    echo "Wrong Input in Physics";
exit;
}
if($_POST['che']<0||$_POST['che']>100){
    echo "Wrong Input in Chemistry";
exit;
}
?>
 <div id="result">
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

 $hindi =$_POST['hin'];
 echo $hindi ;
?></b><br></td>
</tr>
<tr>
   
    <td>English</td>
    <td>100</td>
    <td><b><?php

$english =$_POST['eng'];
echo $english;
?><br></td>
</tr> 

<tr>
    
    <td>Maths</td>
    <td>100</td>
    <td><b><?php
$maths= $_POST['math'];
echo $maths;
?></b><br></td>
</tr>
<tr>
    
    <td>Physics</td>
    <td>100</td>
    <td><b><?php
 $physics =$_POST['phy'];
echo $physics;
?></b><br></td>
</tr>
<tr>
    
    <td>Chemistry</td>
    <td>100</td>
    <td> <b><?php
$chemistry= $_POST['che'];
echo $chemistry;
?><br></td>
</tr><br><br>
<tr>
<td>TOTAL MARKS</td>
<td>500</td>
<td> <b><?php
  

$total=totalmarks($_POST);
echo $total;


 function totalmarks($arrayofsub){
   return $arrayofsub['hin']+  $arrayofsub['eng'] +  $arrayofsub['math'] +  $arrayofsub['phy']+ $arrayofsub['che'];
 }
 ?></b></td>
<tr>

    <td id="per" colspan="2">PERCENTAGE</td>

    
    <td><b>
<?php

     $percent = percentage($total);
     echo $percent;

     function percentage($totalmarks) {
         return ($totalmarks / 500) * 100;
     }
    ?>
</td>
</tr>
<tr>
<td id="per" colspan="2">PASS/FAIL/PASS WITH GRACE</td>
    <td>
<?php
$fail = false;
$fail_sub_marks = 0;
$total_fail_sub = 0;

$subjects = ['hin', 'eng', 'math', 'phy', 'che'];

foreach ($subjects as $subject) {
    if ($_POST[$subject] < 33) {
        $fail = true;
        $total_fail_sub++;
        $fail_sub_marks = $_POST[$subject];
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
<td>USER ID</td>
<td><b><?php
$user_id= $_POST['user_id'];
echo $user_id;

?></b><br></td> 
</tr> 

<?php

$result_action="";

if (isset($_POST["result_action"])) {

$result_action=$_POST["result_action"];

}

?>

<?php

if ($result_action=="edit") {
    ?>
    <h2>UPDATED RESULT</h2>
<?php
   $user_id = $_POST ["user_id"];
 $sql = "UPDATE result_management.user_result  
 SET hindi='{$hindi}', english='{$english}', maths='{$maths}', physics='{$physics}', 
 chemistry='{$chemistry}' WHERE user_id =$user_id";




 $conn->query($sql);
  header("location:viewresult.php?user_id={$user_id}");
  exit;
}
else{
    ?>
    <h2>ADDED RESULT</h2>
    <?php

$sql2 ="SELECT user_id FROM user_result WHERE user_id={$user_id} ";
$result=$conn->query($sql2);

if ($result->num_rows == 0) {

    $sql = "INSERT INTO  result_management.user_result (user_id, hindi, english, maths, physics, chemistry ) 
    VALUES ( '{$user_id}', '{$hindi}', '{$english}', '{$maths}', '{$physics}', '{$chemistry}')";
    $conn->query($sql);
   
    
}    
} 

?>
    </table>
    </div>

</body>
</html>



