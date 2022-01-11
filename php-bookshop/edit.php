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
      <a class="navbar-brand" href="#">Logo</a>
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
      <a class="navbar-brand" href="#">Logo</a>
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
require_once("conn.php");
$id=$_GET['temp'];
$c_id=$_GET['id'];
//------------show and update qty from cart-----------------------
$qq="SELECT * FROM cart where c_id=$c_id";
$result=$conn->query($qq);
echo "<form action='update.php' method='post'>";
echo "<table border='1' id='customers'>";
while($row=$result->fetch_array()){
	echo "<tr><th  colspan='2'>".$row['c_booktitle']."</th></tr>";
    echo "<input type=hidden name=c_id value=".$row['c_id'].">";
  	echo "<input type=hidden name=c_priceperbook value=".$row['c_priceperbook'].">";
    echo "<tr><td  colspan='2'>Quantity : <input type=number min=1 max=999 name=c_qty value=".$row['c_qty']." style='text-align: center;'></td></tr>";
    echo "<tr><td  colspan='2'><input type=submit name=update value=Update id='but'></td></tr>";
    
}
//------------show book detail-----------------------
$q="SELECT * FROM comic where cb_id=$id";
$result=$conn->query($q);
while($row=$result->fetch_array()){
    
    echo "<tr><th><img src=".$row['img']." width='190' height='230'><br><td><h4>Description : </h4><p>".$row['cb_des']."</p></td></th></tr>";
	echo "<tr><td colspan='2'><a href='cart.php'><img src='images/Back.png' width='30' height='30'></a></td></tr>";
}
echo "</table>"; 
?>

</div>
<div id="bottom"><p> </p></div>
</body>
</html>