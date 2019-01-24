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

		.mySlides {
		  	display:none;
		  	height:200px;
  			width: 150px;
		}
		.left_btn 
		{
		float: left;
		border-style: none;
		background-color: black;
		height: 30px;
		width:50px;
		color: white;
		}
		.right_btn
		{

		border-style: none;
		background-color: black;
		float: right;
		height: 30px;
		width:50px;
		color: white;
		}
		.btn{

		      position:relative;
		      width:25%;
		      float: left;
		      margin-top: 140px;
		      
		}
		.w3-content
		{
		  height: 500px;
		  width: 200px;
		  display: inline-block;
		  position: absolute;
		  padding-left:10px; 
		  overflow: hidden;
		  
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
					$query="SELECT pimg FROM product where pid='$prod_id'";
					$select=mysqli_query($con,$query);
					while($row=mysqli_fetch_assoc($select))
					{
					?>


					<div class="w3-content">  
					<?php $a=$row['pimg'];
					$b=explode(',',$a);
					?>
					<?php
					for($i=0;$i<sizeof($b);$i++)
					{
					  ?>
					      <img class='mySlides' src='../product/picture/<?php echo $b[$i]?>' alt='image not found'/><br/>
					      <?php }?>
					      
					</div>
					<div class="btn">
					       <button class="left_btn" onclick="plusDivs(-1)">&#10094;</button>
					        <button class="right_btn" onclick="plusDivs(1)">&#10095;</button>
					 </div>


					<script>
					var slideIndex = 1;
					showDivs(slideIndex);

					function plusDivs(n) {
					  showDivs(slideIndex += n);
					}

					function showDivs(n) {
					  var i;
					  var x = document.getElementsByClassName("mySlides");
					  if (n > x.length) {slideIndex = 1}
					  if (n < 1) {slideIndex = x.length}
					  for (i = 0; i < x.length; i++) {
					    x[i].style.display = "none";  
					  }
					  x[slideIndex-1].style.display = "block";  
					}
					</script>
					<?php
					}
					?>

</div>
				<?php
				$query="SELECT pimg,pid,pname,price FROM product where pid='$prod_id'";
				$select=mysqli_query($con,$query);
				while($row=mysqli_fetch_assoc($select))
				{
				?>
	<div class="top_right">
		DETAILS:<br>
		PRICE IN ₹=<?php echo $row["price"]?>
		<br>
		PICTURE_ID=<?php echo $row["pid"]?>
		<br>
		PRODUCT_NAME=<?php echo $row["pname"]?>
		<br>
	<!-- 	IMAGE_NAME=<?php //echo $row["pimg"]?>
		<br>
	 -->	<a href="comment.php?id=<?php echo $_GET['id'];?>"><button class="view_btn">ADD COMMENT</button></a>
		<a href="addwish.php?id=<?php echo $_GET['id'];?>"><button class="view_btn">ADD TO WISH-LIST</button></a>
		<a href="addtocart.php?id=<?php echo $_GET['id'];?>"><button class="view_btn" name="addtocart">ADD TO CART</button></a>
	</div>
</div>
<?php
}
?>
<div class="bottom">
COMMENTS:
<?php
$query2="SELECT cmt,cid,uname FROM comment where pid='$prod_id'";
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
		echo "comment by user:".$row1['uname'];
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