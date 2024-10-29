<?php require_once("../controller/user_controller.php");?>
<?php include "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/result-management/src/assets/css/manageresult.css">
</head>
<body>
<div class="breadcrumb">
<ul class="breadcrumb">
    <li><a href="/result-management/src/index.php">Home</a></li>
    <li><a href="addresult.php">Add Result</a></li>
    <li><a href="resultaction.php">Added Result</a></li>
</ul>
</div>
<?php


if($_POST['hin']<0||$_POST['hin']>100  && is_numeric($_POST['hin'])  ){
   echo "Wrong Input in Hindi";
exit;
}

 
if($_POST['eng']<0||$_POST['eng']>100  && is_numeric($_POST['eng'])){
    echo "Wrong Input in English";  
exit;
}
if($_POST['math']<0||$_POST['math']>100  && is_numeric($_POST['math'])){
    echo "Wrong Input in Maths";
 exit;

}
if($_POST['phy']<0||$_POST['phy']>100  && is_numeric($_POST['phy'])){
    echo "Wrong Input in Physics";
exit;
}
if($_POST['che']<0||$_POST['che']>100  && is_numeric($_POST['che'])){
    echo "Wrong Input in Chemistry";
exit;
}
?>
 <?php
 $hindi =$_POST['hin'];

$english =$_POST['eng'];

$maths= $_POST['math'];

 $physics =$_POST['phy'];

 $chemistry =$_POST['che'];

$user_id= $_POST['user_id'];
?>
<?php

$result_action="";

if (isset($_POST["result_action"])) {

$result_action=$_POST["result_action"];

}

?>

<?php


$subjects=[
    new subject("hindi",$hindi),
    new subject("english",$english),
    new subject("maths",$maths),
    new subject("physics",$physics),
    new subject("chemistry",$chemistry),

];



$controller= new UserController();
if ($result_action=="edit") {
    ?>
    <h2>UPDATED RESULT</h2>

<?php
$update_result = $controller->update_user_results($subjects,$user_id);
 
  header("location:viewresult.php?user_id={$user_id}");
  exit;
}
else{
    ?>
    <h2>ADDED RESULT</h2>
    <?php

$insert_result = $controller-> insert_user_results($subjects,$user_id);
header("location:viewresult.php?user_id={$user_id}");
exit;


} 


?>
</body>
</html>