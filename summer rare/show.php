<?php 
session_start();
$id=$_SESSION['personid'];
include("dbh.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>SUMMER RARE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <script src='https://kit.fontawesome.com/a076d05399.js'></script>
      <style>
        
       .sticky {
          position: -webkit-sticky;
          position: sticky;
          top: 0;
          background-color:rgb(12,432,12);
          padding: 10px;
          font-size: 20px;
          text-align:right;
          z-index: 1;
        }
        .sticky a{

            margin-right:30px;
            font-size:40px;
        }
        table{
        	margin-right:5%;
        	margin-left:5%;
        }
        tr{
        	border:1px solid black;
        }
        td{
        	width:15%;
        }
    </style>
</head>
<body>

     <div class="sticky" id="sticky">
       
       <a class="login" href="#" ><i class='fas fa-user-tie' style='font-size:24px'></i> <?php echo $_SESSION['name']; ?></a>
       <a class="signout" href="user_logout.php"><i class='fas fa-dumpster' style='font-size:24px'></i> signout</a>
      
       <a onclick="shop()" href="#" id="shop" ><i class='fas fa-shopping-cart' style='font-size:24px'></i> cart()</a>
       
    </div>
    <table>
    <tr>
    	<th>Product image</th>
    	<th>Product Name</th>
    	<th>Product Price</th>
    	<th>Product Quantity</th>
    	<th>Product Total</th>
    </tr>
	<?php 
	$query="SELECT * FROM orders WHERE person_id='$id'";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
		$prod_id=$row['Product_Number'];
		$personid=$row['person_id'];
		$quantity=$row['quantity'];
		$total=$row['total'];
		$query2="SELECT Picture1,Product_Name,Product_price FROM product WHERE Product_Number='$prod_id';";
		$result2=mysqli_query($conn,$query2);
		$row2=mysqli_fetch_array($result2);
	?>
	<tr>
		<td><img src="<?php echo $row2['Picture1']?>" width="200px";height="200px"></td>
		<td><?php echo $row2['Product_Name']?></td>
		<td><?php echo $row2['Product_price']?></td>
		<td><?php echo $quantity?></td>
		<td><?php echo $row2['Product_price']*$quantity ?></td>
	</tr>
<?php } ?>
</table>

</body>
</html>
