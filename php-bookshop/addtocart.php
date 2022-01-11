<?php
    require_once('conn.php');
	session_start();	
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Shopping Cart</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    
     .jumbotron {
      margin-bottom: 0;
    }
   
    
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    .center {
  margin: auto;
  width: 50%;
 
  padding: 10px;
}
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    
  }
  
  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
    font-size: 15px;
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    font-size: 20px;
  }
  </style>
<body>
<div>
		<?php 
			//Welcome message
			if(isset($_SESSION['user_id'])&&isset($_SESSION['user_type'])){
            ?>
				
				
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Online Book Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="shop.php">Home</a></li>
        <li><a href="#">Comic</a></li>
        <li><a href="#">Fiction</a></li>
       
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      <li><a href="checkorder.php"><span class="glyphicon glyphicon-th-list"></span> Check Order</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_fname'] ." ".$_SESSION['user_lname']; ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span></a></li>
        
      </ul>
    </div>
  </div>
</nav>
                <?php	  
			}else{ ?>
                 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Online Book Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="shop.php">Home</a></li>
        <li><a href="#">Comic</a></li>
        <li><a href="#">Fiction</a></li>
       
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="loginpage.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        
      </ul>
    </div>
  </div>
</nav>
             
              <?php
            }
            	
		?>
</div>
<div class="center">
<?php
    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='User'){
?>

<?php
require_once("conn.php");

if(isset($_POST['add'])) {
    $id=$_POST['cb_id'];
    $title=$_POST['cb_title'];
    $qty = $_POST['cb_qty'];
    $price=$_POST['cb_price'];
    $user=$_POST['user'];
    $total=$price*$qty;
    $qq = "select * from cart where user='".$user."' and c_bookid='".$id."';";
	  if($result = $conn->query($qq)){
		  if($result->num_rows == 1){
       
        echo "<table border='1' id='customers'>";
			echo "<tr><th colspan='2'>You already have this book in Cart. !!!</th></tr>";
			echo "<tr><td><a href='cart.php'>Check in Cart</a></td><td><a href='shop.php'>Go to Shop</a></td></tr>";
     
      echo "</table>"; 
		}else{
      $q="INSERT INTO cart(c_bookid,c_booktitle,c_priceperbook,c_qty,c_totalprice,user) VALUES ('$id','$title','$price','$qty','$total','$user');";
      $result=$conn->query($q);
      header('Location:shop.php');
    }
    
    }
  }
  
?>

 </div>   
 <div class="center"> 
<?php }
		else {
      echo "<table border='1' id='customers'>";
			echo "<tr><th colspan='2'>You aren't Member. !!!</th></tr>";
			echo "<tr><td><a href='register.php'>Register</a></td><td><a href='loginpage.php'>Login</a></td></tr>";
     
      echo "</table>"; 
		}?>
    </div>
</body>
</html>
      