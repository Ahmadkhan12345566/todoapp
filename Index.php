
<?php
include 'connect.php';


?>

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
    <table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">First Name</th>
              <th scope="col">Second Name</th>
              <th scope="col">email</th>
              <th scope="col">address</th>
              <th scope="col">dob</th>
              <th scope="col">password</th>
              <th scope="col">operations</th>
            </tr>
        </thead>
        <tbody>


    
<?php 


    $sql = "SELECT * FROM users";
    $results = mysqli_query($con,$sql);
    if($results){
        while($row= mysqli_fetch_assoc($results)){
            $id= $row['id'];
            $first_name= $row['first_name'];
            $second_name= $row['second_name'];
            $email= $row['email'];
            $address= $row['address'];
            $dob= $row['dob'];
            $password= $row['password'];
            echo ' 
          
            <tr>
              <th scope="row">'.$id.'</th>
              <td>'.$first_name.'</td>
              <td>'.$second_name.'</td>
              <td>'.$email.'</td>
              <td>'.$address.'</td>
              <td>'.$dob.'</td>
              <td>'.$password.'</td>
              <td>
            
            <a href="update.php?updateid='.$id.' "><button class = "btn btn-primary">update</button></a>
            
            <a href="connect.php?deleteid='.$id.' "><button class = "btn btn-danger">delete</button> </a>
        </td>
            </tr>
            
            ';
        
        }
    
    }

?>

</tbody>
</table>


<div class="fa fa-align-center" aria-hidden>
        <a href="register.php">
        <button   type="button" name="" id="" class="btn btn-primary" btn-lg btn-block>  Add record</button>
        </a>
    </div>
    
</body>
</html>