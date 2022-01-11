<?php
    require_once('conn.php');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Book Detail</title>
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
<div class="center">
<?php
	if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='User'){


require_once("conn.php");
$cb_id=$_GET['id'];
$q="SELECT * FROM comic where cb_id=$cb_id";
$result=$conn->query($q);

while($row=$result->fetch_array()){
	echo "<table border='1' id='customers'>";
    echo "<tr><th colspan='2'>".$row['cb_title']."</th></tr>";
    echo "<tr><th rowspan='3'><img src=".$row['img']." width='190' height='230'></td><td><h4>Description : </h4><p>".$row['cb_des']."</p></td></tr>";
    echo "<tr><td>Price : ".$row['cb_price']."</td></tr>";
    
 
	
   
   
 echo "</table>"; 
}

?>
<br>
<div style="margin-left: 50%">
<a href="checkorder.php"><img src='images/Back.png' width='30' height='30'></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 

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
</div>
<div id="bottom"><p> </p></div>

  

	</body>
	</html>