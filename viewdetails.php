<?php
include('header.php');
if(isset($_SESSION['u_id']))
{
?>
<!DOCTYPE html>
<html>
<head>
	<title>PRODUCT-DETAILS</title>
	<style type="text/css">
		.top
		{
			width:100%;
			height: 310px;
			margin-top: 5px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 15px;
		}
		.top_left
		{
			margin-top: 2%;
			width:45%;
			height: 80%;
			float: left;
			margin-left: 2%;
			background-color: white;
		}
		.top_right
		{
			margin-top: 2%;
			width:45%;
			height: 80%;
			float: right;
			margin-right: 2%;
			background-color: white;
		}
		.bottom
		{	
			margin-top: 15px;
			
			height: 310px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 15px;
		}
		.cmt_show
		{
			margin-top: 10px;
		}
		.view_btn
		{
			border-radius: 15px;
			background-color: #f98c1f;
		}
	</style>
</head>
<body>
<div class="top">
	<div class="top_left">
		<?php
require ('connection.php');
$con1=new connection();
$con=$con1->connect();
$prod_id=$_GET['id'];
$query="SELECT pimg,pid,pname,price FROM product where pid='$prod_id'";
$select=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($select))
{
?>
<img class='img' src='../product/picture/<?php echo $row["pimg"]?>' alt='image not found'/>

	</div>
	<div class="top_right">
		DETAILS:<br>
		PRICE IN ₹=<?php echo $row["price"]?>
		<br>
		PICTURE_ID=<?php echo $row["pid"]?>
		<br>
		PRODUCT_NAME=<?php echo $row["pname"]?>
		<br>
		IMAGE_NAME=<?php echo $row["pimg"]?>
		<br>
		<a href="comment.php?id=<?php echo $_GET['id'];?>"><button class="view_btn">ADD COMMENT</button></a>
		<a href="addwish.php?id=<?php echo $_GET['id'];?>"><button class="view_btn">ADD TO WISH-LIST</button></a>
		<a href="addtocart.php?id=<?php echo $_GET['id'];?>"><button class="view_btn">ADD TO CART</button></a>
	</div>
</div>
<?php
}
?>
<div class="bottom">
COMMENTS:
<?php
$query2="SELECT cmt,cid FROM comment where pid='$prod_id'";
$select2=mysqli_query($con,$query2);
$rowcount=mysqli_num_rows($select2);
if($rowcount == 0)
{
	echo "NO COMMENTS";
}
else
{
	while($row1=mysqli_fetch_assoc($select2))
	{?>
		<div class="cmt_show">
	<?php	
		echo "comment by user:".$row1['cid'];
		echo "<br>";
		echo $row1['cmt'];
		?>
		</div>
	<?php
	}
}
}
else
{
	header("Location: ../form/login.php");
}
?>
<a href="viewproduct.php"><button class="view_btn">BACK</button></a>
</div>
</body>
</html>