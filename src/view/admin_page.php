<?php 
if (isset($_SESSION['admin'])){
$admin=$_SESSION['admin'];
if($admin!=1){
    echo "<h2>YOU ARE NOT AUTHORISED TO SEE THIS PAGE </h2>";
    die();

}

}
else {
    echo "<h2>YOU ARE NOT AUTHORISED TO SEE THIS PAGE </h2>";
    die();
}
?>


