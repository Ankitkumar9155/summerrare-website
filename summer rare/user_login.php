<?php
session_start();
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
    	.form-value{
    		position:absolute;
    		left:25%;
    		padding-bottom:3em;
    		margin:3em;
    		top:30%;
    		width:50%;
    		
    		text-align:center;
    	}
    	div label{
    		float:left;
    		width:10%;
    	}
    	input{
    		margin-bottom:2em;
    		border-radius:20%;
    		width:90%;

    	}
    	button{
    		width:90%;
    		float:right;
    		border-radius:20%;
    	}
    	.form-value h1{
    		margin-bottom:1em;
    	}

    </style>
</head>
<body>
	    <div class="container summer "  style="width:20%;position:absolute; top:2em">
        <a href="index2.php"><img  class="rounded-circle" class="center" src="uploads/juice.jpg"></a>
        <h5 class="center">SUMMER RARE</h5>
        <p class="center">SHOP FOR SUMMER LOVER</p>
        </div>
        <?php
        	if(isset($_POST['submit_login'])){
        		include("dbh.php");
        		$email=$_POST['email'];
        		$password=$_POST['password'];
        		$query="SELECT person_password,person_first_name,person_id FROM user WHERE person_email='$email'";
        		$result=mysqli_query($conn,$query);
        		if(mysqli_num_rows($result)>0){
        		  $row=mysqli_fetch_array($result);
        		  if($row['person_password']='$password'){
                    $_SESSION['id']='1';
                    $_SESSION['name']=$row['person_first_name'];
                    $_SESSION['personid']=$row['person_id'];
                    header("Location:index3.php");
        		  }

        		}


        	}
        ?>
        <div class="form-value">
        	<h1> USER LOGIN</h1>
        	<form method="post">
		    	<label for="email" class="fas fa-user-tie" style="font-size:24px;"></label>
		    	<input type="text" name="email" placeholder="email">
		    	<br>
		    	<label for="password" class="fas fa-unlock-alt" style="font-size:24px;"></label>
		    	<input type="text"  name="password" placeholder="enter your password">
		    	<br>
		    	<button type="submit"  name="submit_login">Login</button>
            </form>
        </div>

</body>
</html>