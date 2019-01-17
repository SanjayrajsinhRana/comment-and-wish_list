<?php
session_start();
require('connection.php');
$con1=new connection();
$con=$con1->connect();
$uid=$_GET['id'];
$query="DELETE FROM cart where pid='$uid'";
if(mysqli_query($con,$query))
{
	header("Location: ../product/cart.php");
}
else
{
	echo mysqli_error($con);
}
?>
