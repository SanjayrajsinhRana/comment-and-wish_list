<?php
session_start();
if (isset($_SESSION['u_id'])) {
	# code...

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	.header
	{
		height: 35px;
		width: 100%;
		margin-top: 0%;
	}
	.user
	{	
		width: 10%;
		height: 100%;
		float: right;
		background-color: #e0e0d2;
		border-radius: 15px;
	}
	.cart
	{	
		width: 10%;
		height: 100%;
		float: right;
		background-color: #e0e0d2;
		border-radius: 15px;
		margin-right: 5px;
	}
	.wish-list
	{	
		width: 10%;
		height: 100%;
		float: right;
		background-color: #e0e0d2;
		border-radius: 15px;
		margin-right: 5px;
	}

	.log-out
	{	
		width: 10%;
		height: 100%;
		float: right;
		background-color: #e0e0d2;
		border-radius: 15px;
		margin-right: 5px;
	}
	.view_prod
	{	
		width: 10%;
		height: 100%;
		float: right;
		background-color: #e0e0d2;
		border-radius: 15px;
		margin-right: 5px;
	}
	.user_name
	{
		margin-top: 8px;
		margin-left: 20px;
	}
</style>
</head>
<body>
<div class="header">
<div class="user"> 
<p class="user_name">
<?php
echo $_SESSION['uname'];
}
else
{
	header("Location: ../form/login.php");
}
?>
</p>
</div>
<div class="log-out">
	<a href="../form/logout.php"><p class="user_name">LogOut</p></a>
</div>
<a href="cart.php"><div class="cart"><p class="user_name">🛒Cart</p></div></a>
<a href="wish_list.php"><div class="wish-list"><p class="user_name">WishList</p></div></a>
<a href="viewproduct.php"><div class="view_prod"><p class="user_name">ViewProduct</p></div></a>
</div>
</body>
</html>
