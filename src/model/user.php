<?php 
class User {

private $user_id;
private $first_name;
private $last_name;
private $email;
private $phone_no;
private $admin;
private $password;


function __construct($user_id, $first_name,$last_name,$email,$phone_no,$password,$admin){
    $this->user_id = $user_id;
    $this->first_name = $first_name;
    $this ->last_name = $last_name;
    $this ->email = $email;
    $this ->phone_no = $phone_no;
    $this -> password = $password;
    $this -> admin = $admin;
}
function get_user_id(){
    return $this -> user_id;
}  
function set_user_id($id){
     $this -> user_id= $id;
}
function get_first_name(){
    return $this ->first_name;

} 
function set_first_name($fname){
    $this ->first_name=$fname;

} 
function get_last_name(){
    return $this ->last_name;

}
function set_last_name($lname){
    $this ->last_name=$lname;
}
function get_email(){
    return $this->email;
}
function set_email($mail){
    $this->email=$mail;
}
function get_phone_no(){
    return $this ->phone_no;

}
function set_phone_no($phone){
   $this ->phone_no = $phone;

}

function get_password(){
return $this ->password;
}
function set_password($pass){
  $this ->password =$pass;
    }
    function get_admin(){
        return $this ->admin;
    }
    function set_admin($admin){
         $this ->admin=$admin;
    }
}
 

