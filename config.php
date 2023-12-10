<?php 
$conn=new mysqli("localhost","root","","adadb");
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}

?>