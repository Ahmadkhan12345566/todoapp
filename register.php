
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<br>
<br>

<div class="col-md-12 text-center">

<a href="index.php"><button class="btn btn-primary"> click here to display record </button></a>
</div>


<div class = "container">
<form  action ="connect.php" method= "post">
  <div class="form-row">
  <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" name="first_name" class="form-control" id="inputEmail4" placeholder="First Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Second Name</label>
      <input type="text"  name="second_name" class="form-control" id="inputEmail4" placeholder="Second Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email"  name="email"  class="form-control" id="inputEmail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Date of birth</label>
      <input type="date" name="dob"  class="form-control" id="inputCity" required>
    </div>
    <br>
    
  <button type="submit" name = "register_form" class="btn btn-primary">Sign in</button>
</form>
</div>

</body>
</html>