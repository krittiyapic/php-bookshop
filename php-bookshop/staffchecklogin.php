<?php
    require_once('conn.php');
	session_start();	
	
?>

<?php
	if (isset($_POST['login'])){
	$username = $_POST['getusername'];
	$password = $_POST['getpassword'];
	$q = "select * from staff where staff_username='".$username."' and staff_password='".$password."'";
	if($result = $conn->query($q)){
		if($result->num_rows == 1){
			$row = $result->fetch_array();
			$_SESSION['staff_id'] = $row['staff_id'];
			$_SESSION['staff_fname'] =$row['staff_fname'];
			$_SESSION['staff_lname'] =$row['staff_lname']; 
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
			if(isset($_SESSION['staff_id'])){
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
        <li class="active"><a href="store.php">Store</a></li>
        
        <li><a href="#">Comic</a></li>
        <li><a href="#">Fiction</a></li>
       
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="addbook.php"><span class="glyphicon glyphicon-plus"></span> Add Book</a></li>
      <li><a href="manage.php"><span class="glyphicon glyphicon-list-alt"></span> Order</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['staff_fname'] ." ".$_SESSION['staff_lname']; ?></a></li>
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
			if(isset($_SESSION['staff_id'])){					
				echo "<table border='1' id='customers'>";
				echo "<tr><th colspan='3'>Login Successfully. !!!</th></tr>";
				echo "<tr><td><a href='store.php'>Store</a></td><td><a href='addbook.php'>Add Book</a></td><td><a href='manage.php'>Order</a></td></tr>";
		 
		  echo "</table>"; 
			}else{
				
				echo "<table border='1' id='customers'>";
				echo "<tr><th colspan='3'>Wrong Username or Password. !!!</th></tr>";
				echo "<tr><td><a href='stafflogin.php'>Try again.</a></td></tr>";
		 
		  echo "</table>"; 
			}
		?>
	</div>
	
	
</body>
</html>


