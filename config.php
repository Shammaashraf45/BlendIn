<?php 
$conn=new mysqli("localhost","root","","search");
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}

?>