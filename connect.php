<?php

//connecting to database
$con = new mysqli('localhost','root','','php_crud');

if(!$con)
{
    die(mysqli_error($con));

}
//adding data to the table
 if(isset($_POST['submit'])){
    $first_name= $_POST['first_name'];
    $second_name= $_POST['second_name'];
    $email= $_POST['email'];
    $address= $_POST['address'];
    $dob= $_POST['dob'];
    $password= $_POST['password'];

    $sql = "INSERT INTO users (first_name, second_name,email,address,dob,password)
     value('$first_name', '$second_name','$email','$address','$dob', '$password')";
     $result = mysqli_query($con,$sql);
     if($result)
     {
        header('location:index.php');
     }
     else{
        die(mysqli_error($con));
     }
 }

 //deleting data from table 
 if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
     
    $sql = "DELETE FROM users WHERE id=$id";
    $results = mysqli_query($con,$sql);
    if($results)
    {
        header('location:index.php');
    }
    else{
        die(mysql_error($con));
    }

}
//updating data in database

if(isset($_GET['updateid']))
{
    //reading data from table
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
    
    if(isset($_POST['update'])){
        $first_name= $_POST['first_name'];
        $second_name= $_POST['second_name'];
        $email= $_POST['email'];
        $address= $_POST['address'];
        $dob= $_POST['dob'];
        $password= $_POST['password'];
    
        $sql = "UPDATE users set  first_name= '$first_name', second_name='$second_name', email='$email', address='$address',dob='$dob', password='$password' where id= $id";
        $results= mysqli_query($con,$sql);
    
        if($results){
            header('location:index.php');
        }
        else{
            die(mysqli_error($con));
        }
    
    }

}




?>