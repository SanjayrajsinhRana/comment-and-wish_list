<?php
session_start();
?>
<?php
require ('connection.php');
$con1=new connection();
$con=$con1->connect();

$query ="CREATE TABLE IF NOT EXISTS product(
pid int NOT NULL AUTO_INCREMENT PRIMARY KEY,
pname varchar(255),
pimg varchar(255),
price int)";                        
if(mysqli_query($con,$query))
{
	$product=$_POST['pname'];
	$price=$_POST['price'];
$filearray=array();
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
    $temp = $_FILES["files"]["tmp_name"][$key];
    $name = $_FILES["files"]["name"][$key];
     array_push($filearray,$name);
    if(empty($temp))
    {
    	echo "no files";
        break;
    }
     
    if(move_uploaded_file($temp,"picture/".$name))
    {
    	echo $name;
    	echo "uploaded";
    	echo "<br/>";
    }
    else
    {
    	echo "failed to upload";
    }
    
}

$filearray1=array_values($filearray);
    $pim=implode(",", $filearray1);








	// $target = "picture/".basename($_FILES['image']['name']);
	// $p_name = $_FILES['image']['name'];
	// $move = move_uploaded_file($_FILES['image']['tmp_name'],$target);
	$query2 = "INSERT INTO product (pname,pimg,price) VALUES ('$product','$pim','$price')";
	 if(mysqli_query($con,$query2))
	 {
	 	header("Location: ../form/homepage.php?productAdded=DONE");
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