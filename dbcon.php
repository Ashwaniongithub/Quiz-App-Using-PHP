<?php
 $conn = new mysqli("localhost", "root", "", "quiz_db");
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }else{
    // echo 'connected';
 }
?>