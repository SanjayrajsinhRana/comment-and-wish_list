<?php
session_start();
require('../form/connection.php');
$con1=new connection();
$con=$con1->connect();
if(isset($_POST['placeorder'])){
	if($_POST['address'] != null){
		function payment()
		{
			return "done";
		}
		if(payment() == "done")
		{	
			$address=$_POST['address'];
			$user=$_SESSION['u_id'];
			$sqlorder="UPDATE users SET address='$address' WHERE ID='$user'";
			if(mysqli_query($con,$sqlorder))
			{

			}
			else
			{
				echo mysqli_error($con);
			}
		}
		else
		{
			echo "order failed to process";
		}
	}
	else
	{
		echo "please enter address";
	}
}
else
{

}
?>