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
  	.image_box{
  		display:block;
  		position:relative;
  		width:600px;
  		height:500px;
  		margin-left: 30%;
  		border:3px solid black;
  	}
    .image{
      display: block;
      position:relative;
      width:100%;
      height:100%;
      background-color: black;
    }
    span{
    	width:20px;
    	font-size:27px;
    	height:auto;
    }
    .line{
    	width:100%;
    	height:.5px;
    	border:1px solid rgb(2,233,23);
    	margin-bottom:23px;
    }
  </style>
</head>
<body>
	<div class="container">
  <h1>product detail</h1>
  <div class="line"></div>
  <?php
  if(isset($_POST['view']))
{
  $prod_id=$_POST['prod_id'];
  include("dbh.php");
  $query="SELECT * FROM product WHERE Product_Number=$prod_id ";
  $result=mysqli_query($conn,$query);
  $row=mysqli_fetch_array($result);
}
  ?>
  <div class="image_box">
  <img class="image" src="<?php echo $row['Picture1']?>">
  <img class="image" class="image" src="<?php echo $row['Picture2']?>">
  <img class="image" src="<?php echo $row['Picture3']?>">
</div>
  <p><span>Product Name :</span> <?php echo $row["Product_Name"]?></p>
  <p><span>Description :</span> <?php echo $row["Product_Description"]?></p>
  <p><span>Category :</span> <?php echo $row["category"]?></p>
  <p><span>Price :</span> <?php echo $row["Product_price"]?></p>
</div>
  <script type="text/javascript">
    var slide=document.getElementsByClassName("image");
    var i=0;
    var slideindex=0;
    var slidelength=slide.length;
    
    slideshow();
    function slideshow() {
      for(i=0;i<slidelength;i++){
      slide[i].style.display="none";
        }
      slideindex++;
      
        if(slideindex>slidelength){
        slideindex=1;
      }
     
      slide[slideindex-1].style.display="block";
      setTimeout(slideshow, 2000);

    }
  </script>
</body>
</html>
