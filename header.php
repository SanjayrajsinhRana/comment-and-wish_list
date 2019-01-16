<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	.header
	{
		height: 35px;
		background-color: #e6fff7;
		width: 100%;
		margin-top: 0%;
	}
	.user
	{	
		width: 10%;
		height: 100%;
		float: right;
		background-color: #1aff1a;
		border-radius: 15px;
	}
	.wish-list
	{	
		width: 10%;
		height: 100%;
		float: right;
		background-color: #1aff1a;
		border-radius: 15px;
		margin-right: 5px;
	}

	.log-out
	{	
		width: 10%;
		height: 100%;
		float: right;
		background-color: #1aff1a;
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
?>
</p>
</div>
<div class="log-out">
	<a href="../form/logout.php"><p class="user_name">LogOut</p></a>
</div>

<a href="wish_list.php"><div class="wish-list"><p class="user_name">WishList</p></div>
</div></a>
</body>
</html>
