<?php 
// Including the connection
require_once('conn.php');
session_start();	
?> 
<!DOCTYPE html>
<html>
<head>
<title>Add Book</title>
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
?>
<table border="1" id="customers">
<tr><th colspan="2">Add Book</th></tr>
<form action="addbook.php" method="POST" id="des">
<tr><td>Book ID : </td><td><input type="text" name="id"></td></tr>
<tr><td>Book Title : </td><td><input type="text" name="title"></td></tr>
<tr><td>Book Image : </td><td><input type="file" name="img" ></td></tr>	
<tr><td>Book Price : </td><td><input type="text" name="price" ></td></tr>
<tr><td>Book Description : </td><td><textarea name=des form=des style=width:300px;height:100px;></textarea></td></tr>

<tr><td colspan="2"><input type="submit" name="addbook" value="Add" onclick="return confirm('CONFIRM ?')"> <input type="reset" value="Reset" id="but"></td></tr>

</table>

		</div>

<?php

require_once("conn.php");
if(isset($_POST['addbook'])) {
    $title=$_POST['title'];
    $id=$_POST['id'];
    $price=$_POST['price'];
    $img=$_POST['img'];
    $des=$_POST['des'];
    
   
	  $q="INSERT INTO comic(cb_id,cb_title,img,cb_des,cb_price) VALUES ('$id','$title','$img','$des','$price');";
    $result=$conn->query($q);
    if(!$result){
      echo "INSERT failed. Error: ".$mysqli->error;
              
    }
    header("Location: store.php");
  }
  
?>
<div class="center"> 
<?php }
		else {
      echo "<table border='1' id='customers'>";
			echo "<tr><th colspan='2'>You aren't Admin or Staff. !!!</th></tr>";
			echo "<tr><td><a href='shop.php'>Go to Shop</a></td><td><a href='loginpage.php'>Login</a></td></tr>";
     
      echo "</table>"; 
		}?>
    </div>

		


</body>	
</html>		