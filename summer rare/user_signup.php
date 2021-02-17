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
    	body{
    		background-image:url("uploads/juice2.jpg");
    		background-repeat:no-repeat;
    		background-size:100% 1000px;
    		background-color:black;
    	}
    	.summer{
    		left:44%;
    	}

    	.container img{
    		width:50%;
    	}
    	.user_data{
    		width:50%;
    		position:absolute;
    		left:25%;
    		top:30%;


    	}

    	.fas{
    		position:relative;
    		float:left;
    		font-size:30px;
    	}
    	
    	.form-control{
    		float:right;
    		width:95%;
    		margin-bottom:2%;
    		display: inline-block;
    		height: 50px;
    		border-radius: 20%;
    	}
    	.
    	label{
    		float:left;

    	}
    </style>
</head>
<body>
	    <div class="container summer "  style="width:20%;position:absolute; top:2em">
        <a href="index2.php"><img  class="rounded-circle" class="center" src="uploads/juice.jpg"></a>
        <h5 class="center">SUMMER RARE</h5>
        <p class="center">SHOP FOR SUMMER LOVER</p>
        </div>
        <div class="container">
        	<?php
        	include("dbh.php");
        	if(isset($_POST['submit'])){
        		
				$first_name=$_POST['first_name'];
				$last_name=$_POST['last_name'];
				$mobile_number=$_POST['number'];
				$email=$_POST['email'];
				$password=$_POST['password'];

				$query="INSERT INTO user (person_first_name,person_second_name,person_number,person_email,person_password) VALUES ('$first_name','$last_name','$mobile_number','$email','$password') ";
				$result=mysqli_query($conn,$query);
				 if($result){
			            //redirecting to the display page. In our case, it is index.php
			        header("Location: index.php");
			        }
        
        	}
        	?>
        	<form class="user_data" method="post" action="">
        		    <div class="form-value">
        		    	<label for="last_name" class="fas fa-user-tie"></label>
	        		<input class="form-control " type="text" name="first_name" placeholder="first_name" required="required">
	        		</div>
	        		 <div class="form-value">
	        		 	<label for="last_name" class="fas fa-user-tie"></label>
	        		<input class="form-control" type="text" name="last_name" placeholder="last_name" required="required">
	        		</div>
	        		 <div class="form-value">
	        		 	<label for="last_name" class="fas fa-user-tie"></label>
	        		<input class="form-control" type="number" name="number" placeholder="mobile number" required="required">
	        		</div>
	        		 <div class="form-value">
	        		 	<label for="last_name" class="fas fa-user-tie"></label>
	        		<input class="form-control" type="email" name="email" placeholder="email"  required="required">
	        		</div>
	        		 <div class="form-value">
	        		 	<label for="last_name" class="fas fa-user-tie"></label>
	        		<input class="form-control" type="password" name="password" placeholder="password"  required="required">
	        	    </div>
	        		<button  class="form-control bg-primary" type="submit" name="submit" style="color:white" >CREATE ACCOUNT</button>
	        		
        	</form>
        </div>

</body>
</html>
