<?php session_start(); 
 if(!isset($_SESSION['uid']) || $_SESSION['uid']==""){

  header("location:login.php");
 }
?>
<?php

include("inc/db.php");

$name=$_POST['name'];
$s="";

if(isset($_POST['sub'])){

$s=implode(",", $_POST['sub']);
}
$g=$_POST['gender'];
$am=$_POST['am'];
$country=$_POST['country'];

$fn=$_FILES['dp']['name'];
$b=$_FILES['dp']['tmp_name'];

$ext=explode(".", $fn);

$cn=count($ext)-1;

if($ext[$cn]=="jpg" || $ext[$cn]=="jpeg" || $ext[$cn]=="png" )
{
move_uploaded_file($b, "pimg/".$fn);

$ins="INSERT INTO users SET name='$name', ppic='$fn',subject='$s',gender='$g',about_me='$am',country='$country'";
$con->query($ins);

header("location:index.php");
}



?>