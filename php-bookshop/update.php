
<?php
require_once("conn.php");
if(isset($_POST['update'])) {
    $qty = $_POST['c_qty'];
    $id=$_POST['c_id'];
	$price=$_POST['c_priceperbook'];
	$total=$price*$qty;
    $q="UPDATE cart SET c_qty='$qty',c_totalprice='$total' where c_id=$id";
	$result=$conn->query($q);
	if(!$result){
		echo "INSERT failed. Error: ".$mysqli->error;
						
		}
	}
	header("Location: cart.php");
?>
    