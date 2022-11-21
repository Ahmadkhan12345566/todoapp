<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<br>
<br>

<div class="col-md-12 text-center">

<a href="index.php"><button class="btn btn-primary"> Display Record</button></a>
</div>


<div class = "container">
<form  action ="connect.php" method= "post" enctype="multipart/form-data">
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" name="first_name" class="form-control" id="inputEmail4" placeholder="First Name" >
      <p class= "errror"><?php if(isset($_GET['first_name'])){echo " *Enter First Name"; } ?></p>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Last Name</label>
      <input type="text"  name="second_name" class="form-control" id="inputEmail4" placeholder="Second Name" >
      <p class= "errror"><?php if(isset($_GET['second_name'])){echo " *Enter Last  name"; } ?></p>

    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email"  name="email"  class="form-control" id="inputEmail4" placeholder="Email" required>
      <p class= "errror"><?php if(isset($_GET['email'])){echo " *Enter email"; } ?></p>

    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" >
      <p class= "errror"><?php if(isset($_GET['password'])){echo "*Enter password"; } ?></p>

    </div>
  </div>
  <div class="form-group col-md-6">
      <label for="inputEmail4">Add Profile Image</label>
      <input type="file"  name="profile_image" class="form-control" id="inputimage"  >
      <p class= "errror"><?php if(isset($_session['Image_size'])){
        $message = $_SESSION['Image_size'];
        unset($_SESSION['Image_size']);
        echo $message; }
      elseif(isset($_session['Image_type'])){$message = $_SESSION['Image_type'];
        unset($_SESSION['Image_type']);
        echo $message;} ?></p>

    </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" >
    <p class= "errror"><?php if(isset($_GET['address'])){echo " *Enter Address"; } ?></p>

  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Date of birth</label>
      <input type="date" name="dob"  class="form-control" id="inputCity" >
      <p class= "errror"><?php if(isset($_GET['dob'])){echo "*Enter Date of birth"; } ?></p>

    </div>
    <br>
    
  <button type="submit" name = "register_form" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>