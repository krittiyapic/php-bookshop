<?php
//open a new connection from PHP to the database
$server_name="localhost";//server name of the user. Can be 127.0.0.1 -see in the MySQL data: User accout section
$user_name="root";//name of the user
$password='';//depend on each user, here I did not set any pass
$data_access='final';//depend on each user

$conn=new mysqli($server_name,$user_name,$password,$data_access);
if($conn-> connect_errno){
	echo $conn-> connect_errno.":".$conn-> connect_error;
}
//else
//	echo "Connection sucessfully!"; 
//Below is SQL part!
?>
