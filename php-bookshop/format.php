<?php
    require_once('conn.php');
    session_start();
?>
<?php
    if(isset($_POST['format'])){
        $user=$_SESSION['user_id'];
        $q="DELETE from cart where user=$user;";
        if(!$conn->query($q)){
            echo "failed";
            
        }
    }
    header('Location:checkorder.php');
?>