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
	<?php  
include("inc/db.php");
$edid=$_GET['eid'];
 $sel="SELECT * FROM users WHERE id='$edid'";
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){

      $arr=explode(",",$row['subject']);
?>
<form action="upd.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	<p>Name</p>
	<p><input type="text" name="name" value="<?php echo $row['name']; ?>"></p>
	<p>Gender</p>
	<p><input type="radio" name="gender" <?php if($row['gender']=='Male'){ echo "checked"; } ?> value="Male">Male</p>
	<p><input type="radio" name="gender" <?php if($row['gender']=='Female'){ echo "checked"; } ?> value="Female">Female</p>
	<p>Country</p>
	<p>
		<select name="country">
			<option value="">-Select-</option>
			<option value="USA" <?php if($row['country']=='USA'){ echo "selected"; } ?>>USA</option>
			<option value="UK" <?php if($row['country']=='UK'){ echo "selected"; } ?>>UK</option>
			<option value="UAE" <?php if($row['country']=='UAE'){ echo "selected"; } ?>>UAE</option>
			
		</select>
	</p>
	<p>Profile picture</p>
	<p><img src="pimg/<?php echo $row['ppic']; ?>" style="width: 80px;"></p>
	<p><input type="file" name="dp"></p>
	<p>Subject</p>
	<p><input type="checkbox" name="sub[]" <?php if(in_array("C",$arr)){ echo "checked"; } ?> value="C">C</p>
	<p><input type="checkbox" name="sub[]" <?php if(in_array("C++",$arr)){ echo "checked"; } ?> value="C++">C++</p>
	<p><input type="checkbox" name="sub[]" <?php if(in_array("Java",$arr)){ echo "checked"; } ?> value="Java">Java</p>

	<p>About me</p>
	<p><textarea name="am" cols="30" rows="10"><?php echo $row['about_me']; ?></textarea></p>


	<p><input type="submit" name="save" value="Save"></p>
</form>
<?php
       }
      ?>
</body>
</html>