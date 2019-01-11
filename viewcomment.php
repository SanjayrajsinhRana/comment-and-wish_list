<?php
require('connection.php');
$con1=new connection();
$con=$con1->connect();
$query="SELECT * FROM comment";
//$result1 =;
$result1=mysqli_query($con,$query);
?>