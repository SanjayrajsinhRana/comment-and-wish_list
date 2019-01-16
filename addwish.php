<?php
session_start();
require ('connection.php');
$con1=new connection();
$con=$con1->connect();
$query1="CREATE TABLE IF NOT EXISTS wish_list(id int NOT NULL AUTO_INCREMENT PRIMARY KEY,cid int,pid int)";
if(mysqli_query($con,$query1))
{}
else{
	echo mysqli_error($con);
}
//$result1=mysqli_query($con,$query1);

$cid=$_SESSION['u_id'];
$pid=$_GET['id'];
$insert="INSERT INTO wish_list(cid,pid) VALUES ('$cid','$pid')";
if(mysqli_query($con,$insert))
{
		header("Location: ../product/viewdetails.php?id=$pid");
}
else
{
		echo mysqli_error($con);
}
?>
