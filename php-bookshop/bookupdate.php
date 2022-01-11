<?php
require_once("conn.php");
if(isset($_POST['edit'])) {
    $id=$_POST['b_id'];
	$price=$_POST['b_price'];
	$des=$_POST['b_des'];
	$status=$_POST['b_status'];
    $q="UPDATE comic SET cb_price='$price',cb_des='$des',cb_status='$status' where cb_id=$id";
	$result=$conn->query($q);
	if(!$result){
		echo "INSERT failed. Error: ".$mysqli->error;
						
		}
	}
	
	header("Location: store.php");
?>
    