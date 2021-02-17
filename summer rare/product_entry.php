<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<style>
		.header{
			text-align: center;
		}
		label{
			display:inline;
		}
		
		input{
			display:block;
			width:100%;
			height:30px;
			margin-bottom:1.5em;
			border-radius: 12px;
			border:1px solid black;
		}
		select{
			display:block;
			width:100%;
			height:30px;
			margin-bottom:1.5em;
			border-radius: 12px;
			border:1px solid black;
		}
		button{
			width:170px;
			display:block;
			height:30px;
			border-radius:12px;
			margin-bottom:1.5em;
		}
	</style>
</head>
<body>
	<?php
		include("dbh.php");
		if(isset($_POST['submit']))
		{
			
			$Product_Name=$_POST['Product_Name'];
			$Product_Description=$_POST['Product_Description'];
			$Product_Cost=$_POST['Product_Cost'];
			$Product_Price=$_POST['Product_Price'];
			$Quantity=$_POST['Quantity'];
			$Supplier=$_POST['Supplier'];
			$Category=$_POST['Category'];

			if(!empty($_FILES['Picture1']))
			{
				$file=$_FILES['Picture1'];
				$filename=$file['name'];
				$filetmp=$file['tmp_name'];
				$fileext=explode(".", $filename);
				$fileext=end($fileext);
				$filenewlocation1="uploads/".$Product_Name."1.".$fileext;
				move_uploaded_file($filetmp, $filenewlocation1);
			}
			if(!empty($_FILES['Picture2']))
			{
				$file=$_FILES['Picture2'];
				$filename=$file['name'];
				$filetmp=$file['tmp_name'];
				$fileext=explode(".", $filename);
				$fileext=end($fileext);
				$filenewlocation2="uploads/".$Product_Name."2.".$fileext;
				move_uploaded_file($filetmp, $filenewlocation2);
			}
			if(!empty($_FILES['Picture3']))
			{
				$file=$_FILES['Picture3'];
				$filename=$file['name'];
				$filetmp=$file['tmp_name'];
				$fileext=explode(".", $filename);
				$fileext=end($fileext);
				$filenewlocation3="uploads/".$Product_Name."3.".$fileext;
				move_uploaded_file($filetmp, $filenewlocation3);
			}

			$query="INSERT INTO product(Product_Name,Product_Description,Product_Cost,Product_price,Quantity,Supplier,category,Picture1,Picture2,Picture3) VALUES('$Product_Name','$Product_Description','$Product_Cost','$Product_Price','$Quantity','$Supplier','$Category','$filenewlocation1','$filenewlocation2','$filenewlocation3')";
			

			$result=mysqli_query($conn,$query);
			if(mysqli_num_rows($result)>0)
			{
				header("Location:product_entry.php");
			}

		}

	?>
	
	<form class="container" method="post" action="" enctype="multipart/form-data">
		<div class="header"><h1>Add Purchased Product</h1></div>
		<label for ='Product_Name'>Product Name:</label>
		<input type="text" name="Product_Name" placeholder="Product Name" required>

		<label for ='Product_Description'>Product Description:</label>
		<input type="text" name="Product_Description" placeholder="Product Description" required>

		<label for ='Product_Cost'>Product Cost:</label>
		<input type="text" name="Product_Cost" placeholder="Product Cost" required>

		<label for ='Product_Price '>Product Price :</label>
		<input type="text" name="Product_Price" placeholder="Product Price " required>

		<label for ='Quantity'>Quantity:</label>
		<input type="text" name="Quantity" placeholder="Quantity" required>

		<label for ='Supplier'>Supplier:</label>
		
		<select name="Supplier" required>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>

		<label for ='Category'>Category:</label>
		<select name="Category" required>
			<option value="juice">juice</option>
			<option value="shake">shake</option>
			<option value="fruits">fruits</option>
			<option value="fastfood">fastfood</option>
			<option value="colddrink">colddrink</option>
		</select>

		<label for ='Picture1'>Picture1:</label>
		<input type="file" name="Picture1" placeholder="Picture1">

		<label for ='Picture2'>Picture2:</label>
		<input type="file" name="Picture2" placeholder="Picture2">

		<label for ='Picture3'>Picture3:</label>
		<input type="file" name="Picture3" placeholder="Picture3">
 
		<button class="bg-primary" type="submit" name="submit" >Add Product</button>
	</form>
</body>
</html>
