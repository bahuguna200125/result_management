<?php
session_start();
$conn = new mysqli("localhost", "amit", "amit", "result_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>