<?php
    require_once('conn.php');
	session_start();	
	
	if (isset($_POST['login'])){
	$username = $_POST['getusername'];
	$password = $_POST['getpassword'];
	$q = "select * from user where username='".$username."' and password='".$password."'";
	if($result = $conn->query($q)){
		if($result->num_rows == 1){
			$row = $result->fetch_array();
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['user_fname'] =$row['user_fname']; 
			$_SESSION['user_lname'] =$row['user_lname']; 
			$_SESSION['user_type'] = $row['user_type'];
			$_SESSION['user_address'] = $row['user_address'];
			$_SESSION['user_tel'] = $row['user_tel'];
		}
	}else{
		echo 'select failed: '.$conn->error;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Check Login</title>
<link rel="stylesheet" href="setstyle.css">
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
</head>
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
<li><a href="checkorder.php"><span class="glyphicon glyphicon-shopping-cart"></span> Check Order</a></li>
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
	
		<?php
			if(isset($_SESSION['user_id'])){					
				echo "<div class='center'>";
				echo "<table border='1' id='customers'>";
				echo "<tr><th>Login Successfully. !!!</th></tr>";
				echo "<tr><td><a href='shop.php'>Go to Shop</a></td></tr>";
				echo "</table>"; 
				echo "</div>";
					
			}else{
				echo "<div class='center'>";
				echo "<table border='1' id='customers'>";
				echo "<tr><th>Wrong Username or Password. !!!</th></tr>";
				echo "<tr><td><a href='loginpage.php'>Try again.</a></td></tr>";
				echo "</table>"; 
				echo "</div>";
			}
		?>
	
		
		
</body>
</html>


