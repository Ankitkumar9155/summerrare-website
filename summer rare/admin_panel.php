<?php
include("dbh.php");
	if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="SELECT * FROM user WHERE person_email ='$username' AND person_password='$password' ";
		$result=mysqli_query($conn,$query);
		$person=mysqli_fetch_array($result);
		if($person>0){
		}else{
			header('Location:admin_login_page.php');
		}
	}
	else{
		header("Location:admin_login_page.php");
	}
	?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<style>
		.header{
			width:100%;
			height:600px;
			background-color:black;
			background-image:url("uploads/ironman.jpg");
			background-repeat: no-repeat;
			background-size:100% 760px;
			color:white;
			background-color:black;
			text-align:center;
		}
		.admin{
			position:relative;
			top:30%;
			width:35%;
		}
		.image{
			border-radius:50%;

		}
		h1{
			text-align:center;
		}
		a{
			margin-right:30px;

		}
		.link{
			position:relative;
			width:30%;
			left:44%;
		}
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}
		.header1{
		float:left;
		}
		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
		#fruits{
			display:none;
		}
		#user{
			display:none;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="admin container">
			<img class="image" src="uploads/default-avatar.png">
			<h3><?php echo $person['person_first_name']; ?></h3>
			<h2>Administrator</h2>
		</div>

</div>
<div class=" conatiner">
	<h1>Adminstrator Dashboard</h1>
		<div class="link">
		<a href="#">1</a>
		<a href="#">2</a>
		<a href="#juice" onclick="myfunction1()">juice</a>
		<a href="#fruit" onclick="myfunction2()">fruit</a>
		<a href="#user" onclick="myfunction3()">user</a>
	</div>
	<h1 class="header1">Product Detail</h1>
<?php

$query="SELECT * FROM product WHERE category='juice'";
$result=mysqli_query($conn,$query);
?>
<div id="juice">
<table>
	<tr>
		<?php
		echo"
		<th>Product Number</th>
		<th>productName</th>
		<th>Description</th>
		<th>Cost</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Category</th>
		<th>Supplier</th>";
		?>
	</tr>
<?php
while($row=mysqli_fetch_array($result)){
echo"<tr>";
echo "<td>".$row['Product_Number']."</td>";
echo "<td>".$row['Product_Name']."</td>";
echo "<td>".$row['Product_Description']."</td>";
echo "<td>".$row['Product_Cost']."</td>";
echo "<td>".$row['Product_price']."</td>";
echo "<td>".$row['Quantity']."</td>";
echo "<td>".$row['category']."</td>";
echo "<td>".$row['Supplier']."</td>";
echo "</tr>";
echo "<br>";
}
?>

</table>
</div>
<?php

$query="SELECT * FROM product WHERE category='fruits'";
$result=mysqli_query($conn,$query);
?>
<div id="fruits">
<table>
	<tr>
		<?php
		echo"
		<th>Product Number</th>
		<th>productName</th>
		<th>Description</th>
		<th>Cost</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Category</th>
		<th>Supplier</th>";
		?>
	</tr>
<?php
while($row=mysqli_fetch_array($result)){
echo"<tr>";
echo "<td>".$row['Product_Number']."</td>";
echo "<td>".$row['Product_Name']."</td>";
echo "<td>".$row['Product_Description']."</td>";
echo "<td>".$row['Product_Cost']."</td>";
echo "<td>".$row['Product_price']."</td>";
echo "<td>".$row['Quantity']."</td>";
echo "<td>".$row['category']."</td>";
echo "<td>".$row['Supplier']."</td>";
echo "</tr>";
echo "<br>";
}
?>

</table>
</div>
<?php

$query="SELECT * FROM user";
$result=mysqli_query($conn,$query);
?>
<div id="user">
<table>
	<tr>
		<?php
		echo"
		<th>person_id</th>
		<th>person_first_name</th>
		<th>person_second_name</th>
		<th>person_email</th>
		<th>person_number</th>
		<th>person_password</th>;"
		?>
	</tr>
<?php
while($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>".$row['person_id']."</td>";
echo "<td>".$row['person_first_name']."</td>";
echo "<td>".$row['person_second_name']."</td>";
echo "<td>".$row['person_email']."</td>";
echo "<td>".$row['person_number']."</td>";
echo "<td>".$row['person_password']."</td>";
echo "</tr>";
echo "<br>";
}
?>

</table>
</div>
</div>
<script type="text/javascript">
	function myfunction1(){
			document.getElementById("juice").style.display="block";
			document.getElementById("fruits").style.display="none";
			document.getElementById("user").style.display="none";
	}
	function myfunction2(){
			document.getElementById("fruits").style.display="block";
			document.getElementById("juice").style.display="none";
			document.getElementById("user").style.display="none";
	}
	function myfunction3(){
			document.getElementById("user").style.display="block";
			document.getElementById("juice").style.display="none";
			document.getElementById("fruits").style.display="none";
	}
</script>
</body>
</html>

