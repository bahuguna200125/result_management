<?php 
require ("/var/www/html/result-management/src/connection.php");
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
}
?>
