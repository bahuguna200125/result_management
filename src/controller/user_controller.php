<?php 
require ("/var/www/html/result-management/src/view/connection.php");
require "/var/www/html/result-management/src/model/user_result.php";
class UserController{
    private $connection;
    
    function __construct(){
        $mysqlconnection= new MysqlConnection();
        $this->connection = $mysqlconnection->get_connection();
    }

    function get_user_by_id($user_id){
        $sql = "SELECT * FROM user WHERE user_id = $user_id";
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['mail'];
                $phone_no = $row['phone_no'];
                $pass = $row['password'];
                $admin = $row['admin'];
                
                $user = new User($user_id, $fname, $lname, $email, $phone_no, $pass, $admin);
                return $user;
            }
        }

        return false;
    }

    function get_user_by_mail($email){
        $sql2 = "SELECT * FROM user WHERE mail = '$email'";
        $result = $this->connection->query($sql2);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $user_email = $row['mail']; // Use a different variable name
                $phone_no = $row['phone_no'];
                $pass = $row['password'];
                $admin = $row['admin'];
                
                $user = new User($user_id, $fname, $lname, $user_email, $phone_no, $pass, $admin);
                return $user;
            }
        }

        return false;
    }
    function delete_user_details($user_id){
        $result= "DELETE FROM user_result WHERE user_id=$user_id;";
      $this ->connection->query($result);
         
 $sql3= "DELETE FROM user WHERE user_id=$user_id;";
 $this->connection->query($sql3);
    }
    function delete_user_result($user_id){
        $result= "DELETE FROM user_result WHERE user_id=$user_id;";
        $this ->connection->query($result);
    }
    function get_user_result_by_user_id($user_id){
       
        $result_query = "SELECT * FROM user_result WHERE user_id = $user_id";
        $result= $this-> connection->query($result_query);
       if( $result-> num_rows >0){
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $user_id= $row['user_id'];
            $hindi = $row['hindi'];
            $english = $row['english'];
            $maths = $row['maths']; 
            $physics = $row['physics'];
            $chemistry = $row['chemistry'];
         $user_result= new UserResult($id , $this->get_user_by_id($user_id));

          $user_result->addSubject(new subject("hindi",$hindi));
          $user_result->addSubject(new subject("english",$english));
          $user_result->addSubject(new subject("maths",$maths));
          $user_result->addSubject(new subject("physics",$physics));
          $user_result->addSubject(new subject("chemistry",$chemistry));

return $user_result;

       }

    }
    else{
        return false;
    }
}

function authenticate_user($email, $password){
    $sql = "SELECT * FROM user WHERE mail='$email' AND password='$password'";
    $result =$this->connection->query($sql);

    if ($result->num_rows > 0) {
        

        return $this->get_user_by_mail($email);
}
else {
return false;
}
}


function add_user_result() {

    $users = array();
    $sql2 = "SELECT mail, user_id FROM user WHERE user.admin!=1 AND NOT EXISTS (SELECT * FROM user_result WHERE user.user_id=user_result.user_id )";
    $result = $this-> connection->query($sql2); 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['mail'];
            if ( isset ($email)){
     
 $users[]=  $this->get_user_by_mail($email);
}
        }

        return $users;

    }

}
function insert_user_results ($subjects,$user_id){

$sql2 ="SELECT user_id FROM user_result WHERE user_id={$user_id} ";
$result= $this -> connection->query($sql2);

if ($result->num_rows == 0) {

$marks=[];

    foreach($subjects as $subject){
        $marks[$subject->get_subject_name()]=$subject->get_subject_marks();


    }

    $hindi=$marks["hindi"];
    $english=$marks["english"];
    $maths=$marks["maths"];
    $physics=$marks["physics"];
    $chemistry=$marks["chemistry"];

    $sql = "INSERT INTO  result_management.user_result (user_id, hindi, english, maths, physics, chemistry ) 
    VALUES ( '{$user_id}', '{$hindi}', '{$english}', '{$maths}', '{$physics}', '{$chemistry}')";
    $this -> connection->query($sql);
   
}

}

function update_user_results($subjects,$user_id){
    foreach($subjects as $subject){
        $marks[$subject->get_subject_name()]=$subject->get_subject_marks();


    }

    $hindi=$marks["hindi"];
    $english=$marks["english"];
    $maths=$marks["maths"];
    $physics=$marks["physics"];
    $chemistry=$marks["chemistry"];

    $sql = "UPDATE result_management.user_result  
    SET hindi='{$hindi}', english='{$english}', maths='{$maths}', physics='{$physics}', 
    chemistry='{$chemistry}' WHERE user_id =$user_id";
   
   
   
   
    $this -> connection ->query($sql);
}

function insert_user($user){

$firstname= $user->get_first_name();
$lastname= $user->get_last_name();
$mail= $user->get_email();
$mobile_no=$user->get_phone_no();
$pass=$user->get_password();

       
    $sql= "INSERT INTO user (`fname` ,`lname`,`mail`,`phone_no` ,`password`) VALUES ('{$firstname}','{$lastname}','{$mail}','{$mobile_no}','{$pass}')";
    $result= $this -> connection ->query($sql);

    return $result;
}
function edit_user($user){
    $user_id=$user->get_user_id();
    $firstname= $user->get_first_name();
    $lastname= $user->get_last_name();
    $mail= $user->get_email();
    $mobile_no=$user->get_phone_no();
    $pass=$user->get_password();
    
    $sql = "UPDATE result_management.user
    SET fname='{$firstname}', lname='{$lastname}', mail='{$mail}', phone_no='{$mobile_no}', 
    password ='{$pass}' WHERE user_id =$user_id";
    
    $result=  $this ->connection->query($sql);
 
      return $result;
    }

 function get_users_with_results(){
    $users=[];

    $user_query = "SELECT user_id, fname, lname, mail, phone_no FROM user WHERE admin != 1 AND user_id IN (SELECT user_id FROM user_result)";
    $result =$this->connection->query($user_query);
    
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $user_id = $row['user_id'];
            $firstname = $row['fname'];
            $lastname = $row['lname'];
            $mail = $row['mail']; 
            $mobile_no = $row['phone_no'];
           
         

     
         $user= new User ( $user_id,$firstname,$lastname,$mail,$mobile_no,"",0);
      
               $users[]=$user;

        }

    }

    return $users;

 }
function get_users(){
$users=[];
$user_query = "SELECT user_id, fname, lname, mail, phone_no, admin  FROM user";
$result = $this ->connection->query($user_query);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $user_id = $row['user_id'];
        $firstname = $row['fname'];
        $lastname = $row['lname'];
        $mail = $row['mail']; 
        $mobile_no = $row['phone_no'];
        $admin= $row['admin'];
        $user= new User ( $user_id,$firstname,$lastname,$mail,$mobile_no,"",$admin);
        $users[]=$user;
}
}
return $users;
}
}


?>
