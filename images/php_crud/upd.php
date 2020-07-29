<?php session_start(); 
 if(!isset($_SESSION['uid']) || $_SESSION['uid']==""){

  header("location:login.php");
 }
?>
<?php

include("inc/db.php");

$id=$_POST['id'];

$name=$_POST['name'];
$s="";

if(isset($_POST['sub'])){

$s=implode(",", $_POST['sub']);
}
$g=$_POST['gender'];
$am=$_POST['am'];
$country=$_POST['country'];

if(isset($_FILES['dp']['name']) && $_FILES['dp']['name']!=""){

$fn=$_FILES['dp']['name'];
$b=$_FILES['dp']['tmp_name'];

$ext=explode(".", $fn);

$cn=count($ext)-1;

if($ext[$cn]=="jpg" || $ext[$cn]=="jpeg" || $ext[$cn]=="png" )
{
move_uploaded_file($b, "pimg/".$fn);

$upd="UPDATE users SET name='$name', ppic='$fn',subject='$s',gender='$g',about_me='$am',country='$country' WHERE id='$id'";
}
}
else{

$upd="UPDATE users SET name='$name', subject='$s',gender='$g',about_me='$am',country='$country' WHERE id='$id'";

}
$con->query($upd);

header("location:index.php");




?>