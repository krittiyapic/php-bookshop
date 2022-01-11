<?php 
// Including the connection
require_once('conn.php');
?> 
<!DOCTYPE html>
<html>
<head>
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
  margin-top:10%;
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
<title>Staff Login</title>

</head>
<body>
<div class="center">
<table border="1" id="customers">
<form action="staffchecklogin.php" method="POST">
<tr><th colspan="2">Staff Login</th></tr>
<tr><td colspan="2">Username : <input type="text" name="getusername" required></tr></td>				
<tr><td colspan="2">Password :  <input type="password" name="getpassword" required></tr></td>
<tr><td><input type="submit" name="login" value="Login">&nbsp;&nbsp;<input type="reset" value="Reset"></td></tr>
<tr><td>If you are User : <a href="loginpage.php">Click here.</a></td></tr>
 
 </table>
</div>
</body>	
</html>		