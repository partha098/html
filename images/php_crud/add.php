<?php session_start(); 
 if(!isset($_SESSION['uid']) || $_SESSION['uid']==""){

  header("location:login.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="ins.php" method="post" enctype="multipart/form-data">
	<p>Name</p>
	<p><input type="text" name="name"></p>
	<p>Gender</p>
	<p><input type="radio" name="gender" value="Male">Male</p>
	<p><input type="radio" name="gender" value="Female">Female</p>
	<p>Country</p>
	<p>
		<select name="country">
			<option value="">-Select-</option>
			<option value="USA">USA</option>
			<option value="UK">UK</option>
			<option value="UAE">UAE</option>
			
		</select>
	</p>
	<p>Profile picture</p>
	<p><input type="file" name="dp"></p>
	<p>Subject</p>
	<p><input type="checkbox" name="sub[]" value="C">C</p>
	<p><input type="checkbox" name="sub[]" value="C++">C++</p>
	<p><input type="checkbox" name="sub[]" value="Java">Java</p>

	<p>About me</p>
	<p><textarea name="am" cols="30" rows="10"></textarea></p>


	<p><input type="submit" name="save" value="Save"></p>
</form>
</body>
</html>