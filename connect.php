<?php
include "database.php";

//adding data to the table
 if(isset($_POST['register_form'])){
    if(empty($_POST['first_name'])){
        header('location:register.php?first_name');
        exit();
    }
    else{
    $first_name= $_POST['first_name'];
    }

    if(empty($_POST['second_name'])){
        header('location:register.php?second_name');
        exit();
    }
    else{
        $second_name= $_POST['second_name'];
    }
    
    if(empty($_POST['email'])){
        header('location:register.php?email');
        exit();
    }
    else{
        $email= $_POST['email'];
    }
    if(empty($_POST['password'])){
        header('location:register.php?password');
        exit();
    }
    else{
        $password= $_POST['password'];
    }
    
    if(empty($_POST['address'])){
        header('location:register.php?address');
        exit();
    }
    else{
        $address= $_POST['address'];
    }
    if(empty($_POST['dob'])){
        header('location:register.php?dob');
        exit();
    }
    else{
        $dob= $_POST['dob'];
    }
    

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