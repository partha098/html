<?php session_start(); 
 if(!isset($_SESSION['uid']) || $_SESSION['uid']==""){

  header("location:login.php");
 }
?>
<?php  
include("inc/db.php");
$delid=$_GET['did'];
$sel="SELECT * FROM users WHERE id='$delid'";
$rs=$con->query($sel);
while($row=$rs->fetch_assoc()){

	$pic=$row['ppic'];
	unlink("pimg/".$pic);
}

$del="DELETE FROM users WHERE id='$delid'";
$con->query($del);
header("location:index.php");
?>