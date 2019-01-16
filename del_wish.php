<?php
session_start();
require('connection.php');
$con1=new connection();
$con=$con1->connect();
$uid=$_GET['id'];
$query="DELETE FROM wish_list where pid='$uid'";
if(mysqli_query($con,$query))
{
	header("Location: ../product/wish_list.php");
}
else
{
	echo mysqli_error($con);
}
?>