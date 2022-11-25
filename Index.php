
<?php
include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/style.css" type= "text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    .nav-bar-buton{
	float: right;
    align:center;
	background-color: #566787;
}
    </style>
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" style="margin:15px" href="#"><img src="public/assets/icons/icon1.png" width="40px" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Add Record</a>
      </li>

  </div>
</nav>

<div id= "#" class="container">
    <div class="row">
        <div class="btn float-right .text-right">
            <a href="register.php"><button type="button" class="btn btn-primary">Add Record</button></a>
        </div>
    </div>
    
    </form>
    <form action="api.php" method= "post" > 
    <div class="row">
        <div class="btn float-right .text-right">
            
        <button type="submit" name= "export" value= "CSV Export" class="btn btn-primary">EXPORT Data</button>
        </div>
    </div>   
        
    </form>
    
    <form action="api.php" method= "post"  enctype="multipart/form-data">
    <div class="row">
        <div class="btn float-right .text-right">
            
            <a href="api.php"><input type="file" name= "file"></a>
            <button type="submit" name= "import_file" value= "CSV import" class="btn btn-primary">Import file</button>
        
        </div>
    </div>
    </form>
    
    <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Second Name</th>
              <th scope="col">Email</th>
              <th scope="col">Address</th>
              <th scope="col">Profile Image</th>
              <th scope="col">DOB</th>
              <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>


    
<?php 


    $sql = "SELECT * FROM users";
    $results = mysqli_query($con,$sql);
    $i= 0;
    if($results){
        while($row= mysqli_fetch_assoc($results)){
            $id= $row['id'];
            $i++;
            $first_name= $row['first_name'];
            $second_name= $row['second_name'];
            $email= $row['email'];
            $address= $row['address'];
            $profile_image = $row['profile_img'];
            $dob= $row['dob'];
            $password= $row['password'];
            
            echo ' 
          
            <tr>
              <th scope="row">'.$i.'</th>
              <td>'.$first_name.'</td>
              <td>'.$second_name.'</td>
              <td>'.$email.'</td>
              <td>'.$address.'</td>
              <td> <img src="public/upload'.$profile_image.'" height ="90px" width= "90px"/></td>
              <td>'.$dob.'</td>
              <td>
            
            <a href="update.php?updateid='.$id.' "><button class = "btn btn-primary">Update</button></a>
            
            <a href="api.php?deleteid='.$id.' "><button class = "btn btn-danger">Delete</button> </a>
        </td>
            </tr>
            
            ';
        
        }
    
    }

?>

</tbody>
</table>


</div>
</body>
</html>