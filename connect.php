<?php
session_start();
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
    if(empty($_FILES['profile_image'])){
        header('location:register.php?profile_image');
        exit();
    }
    else{
        $profile_image= $_FILES['profile_image'];
        //saving profile details in variable
        $file_name =$profile_image['name'];
        $file_error =$profile_image['error'];
        $file_temp= $profile_image['tmp_name'];
        //separating extension from file name
        $file_ext = explode('.',$file_name);
        
        //converting file to lowercase
        
        


        $file_check = strtolower(end($file_ext));
        $newfilename = round(microtime(true)) . '.' . end($file_ext);

        //
        $file_ext_stored = array('jpg','png','jpeg');

        if(in_array($file_check,$file_ext_stored)){
            $destination_file = 'profile_images/'.$file_name;
            $uploaded_file = move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newfilename);
            
        }
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
    

    $sql = "INSERT INTO users (first_name, second_name,email,profile_img,address,dob,password)
     value('$first_name', '$second_name','$email','$uploaded_file','$address','$dob', '$password')";
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
        if(empty($_POST['first_name'])){
            
            $_SESSION['first_name']= "*Enter name";
            header('location:update.php?updateid='.$id.'');
            exit();
        }
        else{
        $first_name= $_POST['first_name'];
        }
        if(empty($_POST['second_name'])){
            
            $_SESSION['second_name']= "*Enter Second Name";
            header('location:update.php?updateid='.$id.'');
            exit();
        }
        else{
            $second_name= $_POST['second_name'];
            }
         if(empty($_POST['email'])){
            
            $_SESSION['email']= "*Enter Email";
            header('location:update.php?updateid='.$id.'');
            exit();
        }
        else{
            $email= $_POST['email'];
        }
        if(empty($_POST['address'])){
            
            $_SESSION['address']= "*Enter Address";
            header('location:update.php?updateid='.$id.'');
            exit();
        }
        else{
            $address= $_POST['address'];
        }
        if(empty($_POST['dob'])){
            
            $_SESSION['dob']= "*Enter Date of Birth";
            header('location:update.php?updateid='.$id.'');
            exit();
        }
        else{
            $dob= $_POST['dob'];
        }
        if(empty($_POST['password'])){
            
            $_SESSION['password']= "*Enter Password";
            header('location:update.php?updateid='.$id.'');
            exit();
        }
        else{
            $password= $_POST['password'];
        }
        
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