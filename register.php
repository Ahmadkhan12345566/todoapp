
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
    <div class="container">
    
<form action="connect.php" method = "post">
<p>Enter your First Name</p>
<input type="text" name="first_name" placeholder="Enter First Name" required>
<br>
<p>Enter your Second Name</p>
<input type="text" name="second_name" placeholder="Enter Second Name" required >
<br>
<p>Enter your email</p>
<input type="email" name="email" placeholder="enter your email" required>
<br>
<p>Enter your address</p>
<textarea name="address" id="" cols="30" rows="5"  required></textarea>
<p>Enter your Date of birth</p>
<input type="date" name="dob" placeholder="enter your date of birth" required>
<br>

<p>Enter password</p>


<input type="password" name="password" required>
<button type="submit" name="submit">Submit</button>
</form>
</div>
<br>
<br>

<div class="container">

<a href="index.php"><button class="btn btn-primary"> click here to display record </button></a>
</div>

</body>
</html>