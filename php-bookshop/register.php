<?php 
require_once('conn.php');
?> 

<!DOCTYPE html>
<html>
<head> 
<title>Register</title>
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
  margin-top:5%;
  padding: 10px;
}
.center2 {
  margin: auto;
  width: 50%;
  margin-bottom:5%;
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
<div class="center">
<table border="1" id="customers">
<tr><th>Registration</th></tr>
	<form method="post" action="register.php">
        <tr><td>Firstname : <input type="text" name="fname" size="20" required></td></tr>
        <tr><td>Lastname : <input type="text" name="lname" size="20" required></td></tr>
        <tr><td>Address : &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="address" size="20" required></td></tr>
        <tr><td>Tel : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="tel" size="20" required></td></tr>
		<tr><td>Username : <input type="text" name="username" size="20" required></td></tr>
		<tr><td>Password : <input type="password" name="password" size="20" required></td></tr>
		<tr><td><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;<input type="reset" name="reset" value="Reset"></td></tr>
        <tr><td><a href='loginpage.php'>Login</a></td></tr>
    </form>
    </table>
</div>
	
	<?php
    require_once('conn.php');
    // Get input information 
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $address=$_POST['address'];
        $tel=$_POST['tel'];
        $username=$_POST['username'];
        $password=$_POST['password'];

		
    // Insert to the userdata TABLE
    $q="INSERT INTO user (user_fname,user_lname,username,password,user_type,user_tel,user_address) 
    VALUES ('".$fname."','".$lname."','".$username."','".$password."','User','".$tel."','".$address."');";
	
    $result=$conn->query($q);
    if(!$result){
        echo "failed. Error: ".$conn->error;
                
      }
      echo "<div class='center2'>";
      echo "<table border='1' id='customers'>";
      echo "<tr><th>Regiser Successfully !!!</th></tr>";
      echo "<tr><td><a href='loginpage.php'>Go to Login</a></td></tr>";
      echo "</table>"; 
      echo "</div>";
				
    }
    
	?>
	
<body>
</html>