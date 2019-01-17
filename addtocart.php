<?
session_start();
require ('connection.php');
$con1=new connection();
$con=$con1->connect();
$insert="CREATE TABLE IF NOT EXISTS cart(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
pid int,
cid int)";
if (mysqli_query($con,$insert)) 
{
	$cid=$_SESSION['u_id'];
	$pid=$_GET['id'];
	$incart="INSERT IGNORE INTO cart(pid,cid) VALUES ('$pid','$cid')";
	if (mysqli_query($con,$incart)) 
	{
		header("Location: ../product/viewdetails.php?id=$pid");
		//header("Location: ../product/viewdetails.php?id=$pid");

	}
	else
	{
		echo mysqli_error($con);
	}
}
else
{
	echo mysqli_error($con);
}
?>