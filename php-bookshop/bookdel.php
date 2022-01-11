<?php
//delete object by id
require_once("conn.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$q="DELETE from comic where cb_id=$id;";
	if(!$conn->query($q)){
		echo "failed";
		
	}
header('Location:store.php');
	
}
?>