<?php
include "database.php";

//adding data to the table
 if(isset($_POST['register_form'])){
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

    if(isset($_POST['update_form'])){
        $id=$_POST['id'];
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




?>