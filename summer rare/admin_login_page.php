<?php
include_once("dbh.php");
?>
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
			width:100%;
			height:657px;
			background-color:black;
			background-image:url("uploads/ironman.jpg");
			background-repeat: no-repeat;
			background-size:100% 760px;
			color:white;
			background-color:black;
			text-align:center;
		}
		.container{
			position:relative;
			top:30%;
			width:35%;
		}
		h3{
			margin-bottom:40px;
		}
		input {
			width:100%;
			height:60px;
			margin-bottom: 30px;
			border-radius:25px;
		}
		button {
			width:100%;
			height:50px;
			background-color: rgb(403,11,1);
			margin-bottom: 20px;
			margin-top:30px;
			border-radius:25px;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="container">
			<h3>Administration Login</h3>
			<form method="post" action="admin_panel.php">
				<input type="text" placeholder="username" name="username">
				<input type="text" placeholder="password" name="password">
				<button type="submit" name="submit">submit</button>
			</form>
		</div>
</div>

</body>
</html>

