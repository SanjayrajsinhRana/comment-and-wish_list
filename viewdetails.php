<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.top
		{
			width:100%;
			background-color: black;
			height: 310px;
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
			margin-top: 5px;
			background-color: gray;
			height: 310px;
		}
		.cmt_show
		{
			margin-top: 10px;
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
$query="SELECT pimg,pid,pname FROM product where pid='$prod_id'";
$select=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($select))
{
?>
<img class='img' src='../product/picture/<?php echo $row["pimg"]?>' alt='image not found'/>

	</div>
	<div class="top_right">
		DETAILS:<br>
		PICTURE_ID=<?php echo $row["pid"]?>
		<br>
		PRODUCT_NAME=<?php echo $row["pname"]?>
		<br>
		IMAGE_NAME=<?php echo $row["pimg"]?>
		<br>
		<a href="comment.php?id=<?php echo $_GET['id'];?>"><button>ADD COMMENT</button></a>
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
?>
<a href="viewproduct.php"><button>BACK</button></a>
</div>
</body>
</html>