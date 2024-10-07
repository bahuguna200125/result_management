<?php 

require "../model/user_result.php"; 
require "../controller/user_controller.php";

$controller = new UserController();

$user = $controller->get_user_by_id(10);


if ($user){
    echo $user->get_email()."<br>";
    echo $user->get_first_name()."<br>";
    echo $user->get_last_name()."<br>";
    echo $user->get_password()."<br>";
    echo $user->get_admin()."<br>";
    echo $user->get_phone_no()."<br>";

    
}
else {
    echo "User Not Found"."<br>";
}


$controller = new UserController();
$user = $controller->get_user_by_mail ("bhaskarbahuguna8@gmail.com");
if ($user){
    echo $user->get_email()."<br>";
    echo $user->get_first_name()."<br>";
    echo $user->get_last_name()."<br>";
    echo $user->get_password()."<br>";
    echo $user->get_admin()."<br>";
    echo $user->get_phone_no()."<br>";
    echo $user->get_user_id()."<br>";
   
}
else {
    echo "User Not Found"."<br>";
}

$user_result=new User_result( 10,1,  50,90,88,81, 70,);
echo $user_result->get_id()."<br>";
echo $user_result->get_user_id()."<br>";
echo $user_result->get_hindi()."<br>";
echo $user_result->get_english()."<br>";
echo $user_result->get_maths()."<br>";
echo $user_result->get_physics ()."<br>";
echo $user_result-> get_chemistry()."<br>";

$user_result->set_id(4);

echo $user_result->get_id()."<br>";
$user_result->set_user_id(2);
 echo $user_result->get_user_id()."<br>";
 $user_result->set_hindi(99);
 echo $user_result->get_hindi()."<br>";
 $user_result->set_english(88);
 echo $user_result->get_english()."<br>";
 $user_result->set_maths(77);
 echo $user_result->get_maths()."<br>";
 $user_result->set_physics(66);
 echo $user_result->get_physics()."<br>";
 $user_result->set_chemistry(55);
 echo$user_result->get_chemistry()."<br>";
