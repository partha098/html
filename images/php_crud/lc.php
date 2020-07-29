<?php
session_start();
include("inc/db.php");

$username=$_POST['username'];
$password=$_POST['password'];

 $sel="SELECT * FROM admin WHERE username='$username' AND password='$password'";
$rs=$con->query($sel);

if($rs->num_rows>0){

	while($row=$rs->fetch_assoc()){
		$_SESSION['uid']=$row['id'];
		$_SESSION['un']=$row['name'];
		header("location:index.php");
	}

}
else{
?>
<script>
	alert("Incorrect Username/password");
	window.location='login.php';
</script>

<?php	
}


?>