<?php require "../model/user.php"; 

$user=new User(1,  "amit","bahugna","amitbahuguna55@gmail.com",8192047322,1,1234);
echo $user->get_user_id()."<br>";
echo $user->get_first_name()."<br>";
echo $user->get_last_name()."<br>";
echo $user->get_email()."<br>";
echo $user->get_phone_no()."<br>";
echo $user->get_admin()."<br>";
echo $user-> get_password()."<br>";

$user->set_user_id(4);

echo $user->get_user_id()."<br>";
 $user->set_first_name("bhaskar");
 echo $user->get_first_name()."<br>";
 $user->set_last_name("bahuguna");
 echo $user->get_last_name()."<br>";
 $user->set_email("bhaskarbahuguna8@gmail.com");
 echo $user->get_email()."<br>";
 $user->set_phone_no(7409901846);
 echo $user->get_phone_no()."<br>";
 $user->set_admin(3);
 echo $user->get_admin()."<br>";
 $user->set_password(740990);
 echo $user->get_password()."<br>";


 $user2 = new User(5,"mohit","bisht","mohit@gmail.com",7654383838,6,7600);
 echo $user2->get_user_id()."<br>";
 echo $user2 ->get_first_name()."<br>";
 echo $user2 -> get_last_name()."<br>";
 echo $user2 -> get_email()."<br>";
 echo $user2 -> get_phone_no()."<br>";
 echo $user2 -> get_admin()."<br>";
 echo $user2->get_password()."<br>";

?>