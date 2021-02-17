<?php 
session_start();

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
       
        .all{
            position:relative;
            width:100%;
            height:660px;
            background-image:url("uploads/juice2.jpg");
            background-repeat:no-repeat;
             background-size:100% 900px;
          
        }
        .center{
            position:relative;
            text-align:center;
            color:white;
        }
        .rounded-circle{
            position:relative;
            left:26%;
            width:50%;
        }
        
        .search{
            width:80%;
            position:absolute;
            top:12%;
            margin-left:20%;
            height:32px;

        }
        .search .click{
            position:relative;
            float:left;
            width:2.4%;
            height:100%;
            background-color:green;
        }
        .search .place{
           position:relative;
           width:60%;
           height:100%;
           text-align:center;

            
        }
       
       
        .total{
           position: relative;
            width:100%;
            height:380px;
           
            margin-bottom:30px;
        }
        .image{
            padding-left:1%;

        }
        .total :hover{
            border:.4px solid brown;
        }
         .name :hover{
            border:0px solid brown;
        }
        .name{
            position:relative;
            text-align:center;
            bottom:32%;
        }
        .price{
            position:relative;
            bottom:49%;
            text-align: right;
            

        }
        
       .line{
        width:100%;
        height:2px;
       }
       .prod{
        display:none;
       }
       .num{
        position:relative;
        bottom:4.2em;
       }
       a{
        cursor:pointer;
       }
        button{
        cursor:pointer;
       }
       .links{
        width:40px;
        padding:4px;
        font-size:28px;
        background-color: rgb(123,12,232);
       }
       .category{
        text-align: center;
       }
       .hide{
        display:none;
       }
       #selected{
        display:none;
       }
       #logged{
        display:none;
       }

    </style>
</head>
<body>
  
         <div class="sticky" id="sticky">
           
           <a class="login" href="user_login.php" ><i class='fas fa-user-tie' style='font-size:24px'></i> login</a>
           <a class="login" href="user_signup.php"><i class='fas fa-dumpster' style='font-size:24px'></i> signup</a>
          
           <a onclick="shop()" href="" id="shop" ><i class='fas fa-shopping-cart' style='font-size:24px'></i> cart()</a>
           
        </div>
 
    <div class="all">
        
        <div class="container "  style="width:40%;position:relative; top:12em">
            <img  class="rounded-circle" class="center" src="uploads/juice.jpg">
            <h1 class="center">SUMMER RARE</h1>
            <h6 class="center">SHOP FOR SUMMER LOVER</h6>

        </div>
        <div class="search">
            <form action="search.php" id="form" method="post">
                <input class="click" type="image"  name="click" src="uploads/search.png" >
                <input  class="place" type="text" id="search" name="search" placeholder="search the product">
                
            </form>

        </div>
       
    </div>
    <div class="container category">
        <a class="links" onclick="juice()" >juice</a>
        <a class="links" onclick="shake()">shake</a>
        <a class="links" onclick="fruits()">fruits</a>
        <a class="links" onclick="fastfood()">fastfood</a>
        <a class="links" onclick="colddrink()">colddrink</a>
    </div>
    <br>
    <br>
    <?php  
    $query="SELECT * FROM product ORDER BY Product_number ASC";
    $result=mysqli_query($conn,$query);
    while($res=mysqli_fetch_array($result)){
        $product_id=$res['Product_Number'];
        
        
     ?>
        <div class="line container bg-primary">
            
        </div>
        <br>            <br> <br>

        <div class="total container">
            <div class="image">

            <img src="<?php echo $res['Picture1'] ?>" width='300px' height='300px'>
            </div>
            
                <h3 class="name"><?php echo $res['Product_Name']?></h3>
           
            
                <h5 class="price">price:<?php echo $res['Product_price']?> rupees</h5>
                <form method="post" action="product_detail.php">
                    <input class="prod" type="text" name="prod_id" value="<?php echo $product_id ?>" >
                    <input type="submit" name="view" value="view product detail">
                </form>
                <form class="num" id="add" action="selected_item.php" method="post">
                <a onclick="minus()">-</a>&nbsp;<input id="<?php echo $product_id ?>" type="number" name="num" value="1">&nbsp;<a onclick="plus(<?php echo $product_id ?>)">+</a>&nbsp;&nbsp;
                <input class="hide" type="text" name="product" value="<?php echo $product_id ?>">
                <a name="submit" onclick="add(<?php echo $product_id ?>)">add</a>
            </form>
            <br>
            <br> <br><br>
        </div>
        
    <?php } ?>
    <form id="selected" method="post" action="selected_item.php">
        <input type="text" id="id01" name="id">
        <input type="text" id="id02" name="quantity">
    </form>
    
 
      
<script>
    var j=<?php echo $product_id; ?>;
    var product=[];

    var quantity=[];

    function plus(n){
        
        var i=0;
       
        i=document.getElementById(n).value;
        i=parseInt(i);
   
        document.getElementById(n).value=i+1;
    }
    function add(n){
        var l=n;
        var j=product.includes(n);
        var q=document.getElementById(n).value;
        if(j==true){
            alert("already included in cart")
        }else{
        product.push(l);
        quantity.push(q);
        var length=product.length;
        var shop="cart"+"("+length+")";
        
        document.getElementById("shop").innerHTML=shop;
        alert("sucessfully added to cart");
    }
    }
    function shop(){
    	var session_id=<?php echo $_SESSION['id']; ?>;
    	if(session_id===1){

    		 document.getElementById("selected").submit();

    	}
    	else{
    		windows.location.href="user_login.php";
    	}
        document.getElementById("id01").value=product;
        document.getElementById("id02").value=quantity;
       
        
    }

    function juice(){
        document.getElementById("search").value="juice";
        document.getElementById("form").submit();
    }
     function shake(){
        document.getElementById("search").value="shake";
        document.getElementById("form").submit();
    }
     function fruits(){
        document.getElementById("search").value="fruits";
        document.getElementById("form").submit();
    }
     function FastFruit(){
        document.getElementById("search").value="FastFruit";
        document.getElementById("form").submit();
    }
     function colddrink(){
        document.getElementById("search").value="colddrink";
        document.getElementById("form").submit();
    }

    
</script>
</body>
</html>
