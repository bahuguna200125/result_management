<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conn = new mysqli("localhost", "root", "Amit@2001", "result_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class MysqlConnection{
    
    private $conn ;
   function __construct (){
    $this->conn = new mysqli("localhost", "root", "Amit@2001", "result_management");

   }
function get_connection(){
    return $this->conn ;
}
}
?>
