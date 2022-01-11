<?php
    require_once('conn.php');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>User Profile</title>
<link rel="stylesheet" href="staffstyle.css">
<body>
<div id="subhead">
	<?php 
			//Welcome message
			if(isset($_SESSION['staff_id'])){
			
				echo "Welcome : ".$_SESSION['staff_fname']." ".$_SESSION['staff_lname'].". You are Staff.---"."<a href='logout.php'>Logout</a>";
				
			}else{
				echo "Welcome guess!";
			}		
		?>
	</div>
	<div id="menu">
	<a href="store.php" id="staffmenu">Store</a>
	<a href="addbook.php" id="staffmenu">Add Book</a>
	<a href='manage.php' id="staffmenu">Order</a>
	</div>

<div id="cart">

<?php
	


require_once("conn.php");
$id=$_GET['id'];
$q="SELECT * FROM user where user_id=$id";
$result=$conn->query($q);
while($row=$result->fetch_array()){
	echo "<h1>User Profile</h1><br>";
    echo "<h3>UID : ".$row['user_id']."</h3>";
    echo "<h3>Name : ".$row['user_fname']." ".$row['user_lname']."</h3>";
    echo "<h3>Address : ".$row['user_address']."</h3>";
	echo "<h3>Tel. : ".$row['user_tel']."</h3>";;
}

?>
<br>


</div>
<div id="bottom"><p> </p></div>
	</body>
	</html>