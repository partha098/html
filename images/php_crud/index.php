<?php session_start(); 
 
 if(!isset($_SESSION['uid']) || $_SESSION['uid']==""){

  header("location:login.php");
 }

?>
<?php
include("inc/db.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <h1>Welcome: <?php echo $_SESSION['un']; ?></h1>
  <a href="add.php" class="btn btn-primary">Add new</a>  

  <a href="logout.php" class="btn btn-danger">Logout</a>

  <form action="" method="post">
    <input type="text" name="srch" placeholder="Enter name"><input type="submit" name="xyz" value="Search" class="btn btn-primary">
  </form>         
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Profile Pic</th>
         <th>Gender</th>
        <th>Country</th>
        <th>About Me</th>
        <th>Subject</th>
        <th>Delete</th>
        <th>Update</th>
        
      </tr>
    </thead>
    <tbody>
      <?php
      if(isset($_POST['srch']) && $_POST['srch']!=""){
      
      $s=$_POST['srch'];
      $sel="SELECT * FROM users WHERE name LIKE '$s%'";
      }
      else{
        $sel="SELECT * FROM users";
      }
      
      $rs=$con->query($sel);
      while($row=$rs->fetch_assoc()){
      ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><img src="pimg/<?php echo $row['ppic']; ?>" style="width: 150px;"></td>
         <td><?php echo $row['gender']; ?></td>
         <td><?php echo $row['country']; ?></td>
         <td><?php echo $row['about_me']; ?></td>
         <td><?php echo $row['subject']; ?></td>
        <td><a href="del.php?did=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');"    >Delete</a></td>

         <td><a href="edit.php?eid=<?php echo $row['id'] ?>" class="btn btn-success"   >Update</a></td>
       
      </tr>
      <?php
       }
      ?>
      
    </tbody>
  </table>
</div>

</body>


</html>
