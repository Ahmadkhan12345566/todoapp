<?php
include 'database.php';
$id= $_GET['updateid'];
$sql= "SELECT * FROM users WHERE id=$id";
$results = mysqli_query($con,$sql);
$row= mysqli_fetch_assoc($results);
$first_name= $row['first_name'];
$second_name= $row['second_name'];
$email= $row['email'];
$address= $row['address'];
$dob= $row['dob'];
$password= $row['password'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<br>
<div class ="header-btn" >

<a href="index.php"><button > click here to display record </button></a>
</div>
<div class="container">


<br>



<div class = "container">
<form action= "connect.php" method= "post">
    <input type="hidden" name="id" value="<?php echo "$id"?>">
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" name="first_name" value = "<?php echo "$first_name"?>" class="form-control" id="inputEmail4" placeholder="First Name">
      <p class= "errror"><?php if(isset($_GET['first_name'])){echo " *Enter First Name"; } ?></p>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Second Name</label>
      <input type="text"  name="second_name" value = "<?php echo "$second_name"?>" class="form-control" id="inputEmail4" placeholder="Second Name">
      <p class= "errror"><?php if(isset($_GET['second_name'])){echo " *Enter Last  name"; } ?></p>

    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email"  name="email"  value = "<?php echo "$email"?>" class="form-control" id="inputEmail4" placeholder="Email">
      <p class= "errror"><?php if(isset($_GET['email'])){echo " *Enter email"; } ?></p>

    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" value = "<?php echo "$password"?>"  class="form-control" id="inputPassword4" placeholder="Password">
      <p class= "errror"><?php if(isset($_GET['password'])){echo "*Enter password"; } ?></p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address"  value = "<?php echo "$address"?>" class="form-control" id="inputAddress" placeholder="1234 Main St">
    <p class= "errror"><?php if(isset($_GET['address'])){echo " *Enter Address"; } ?></p>
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Date of birth</label>
      <input type="date" name="dob" value = "<?php echo "$dob"?>"  class="form-control" id="inputCity">
      <p class= "errror"><?php if(isset($_GET['dob'])){echo "*Enter Date of birth"; } ?></p>
    </div>
    <br>
    
  <button type="submit" name = "update_form" class="btn btn-primary">Update</button>
</form>
</div>
</body>
</html>