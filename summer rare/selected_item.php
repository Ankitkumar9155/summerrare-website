<!DOCTYPE html>
<html>
<head>
</head>
<body>
	
	<?php 
	session_start();
	include("dbh.php");
	if(isset($_POST['userid'])){
		$userid=$_SESSION['personid'];
		$quantity=$_POST['quantity'];
		$productid=$_POST['productid'];
		$query="SELECT Product_price FROM product WHERE Product_Number='$productid'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		$price=$row['Product_price'];
		$quantity=(float)$quantity;
		$price=(float)$price;
		$total=$quantity * $price;
		$location="index3.php#".$productid;
		$a="index3.php";
		$query="INSERT INTO orders (person_id,quantity,Product_Number,total) VALUES('$userid','$quantity','$productid','$total');";
		$result=mysqli_query($conn,$query);
		header("Location:$location");
		
	}
	?>
	
</body>
</html>