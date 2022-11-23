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
        if ($_FILES["profile_image"]["size"] > 1000000) {
            $_SESSION['Image_size']= "*Image size is greater then 5mb";
            exit();
    }
    else{
        $file_ext = explode(".",$_FILES["profile_image"]["name"]) ;
        $image_file_type = strtolower(end($file_ext)) ;
        if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif" ) {
        $_SESSION['Image_type']= "*Image type error";
        exit();
        }else{
        $temp = explode(".", $_FILES["profile_image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $uploaded_file =move_uploaded_file($_FILES["profile_image"]["tmp_name"], "public/upload" . $newfilename);
        
        
        }
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
     value('$first_name', '$second_name','$email','$newfilename','$address','$dob', '$password')";
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
        if(empty($_FILES['profile_image'])){
            $_SESSION['profile_image']= "*add pic ";
            header('location:update.php?updateid='.$id.'');
            exit();
        }
        
        else{
            if ($_FILES["profile_image"]["size"] > 500000) {
                var_dump($_FILES["profile_image"]["size"]);
                $_SESSION['Image_size']= "*Image size is greater then 5mb";
                header('location:update.php?updateid='.$id.'');
                exit();
            }
        else{
            $file_ext = explode(".",$_FILES["profile_image"]["name"]) ;
            $image_file_type = strtolower(end($file_ext)) ;
            if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif" ) {
            $_SESSION['Image_type']= "*Image type error";
            exit();
            }else{
            $temp = explode(".", $_FILES["profile_image"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $uploaded_file =move_uploaded_file($_FILES["profile_image"]["tmp_name"], "public/upload" . $newfilename);
            
            }
            }
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
    
        $sql = "UPDATE users set  first_name= '$first_name', second_name='$second_name', email='$email', profile_img='$newfilename', address='$address',dob='$dob', password='$password' where id= $id";
        $results= mysqli_query($con,$sql);
    
        if($results){
            header('location:index.php');
        }
        else{
            die(mysqli_error($con));
        }
    
    }

//exporting  csv file 
if(isset($_POST['export'])){
    header('Content-Type: text/csv;');
    header('Content-Disposition: attachment; filename="data.csv"');
    $output = fopen("php://output", "w");
    fputcsv($output, array('id','first_name', 'second_name','email','address','password','dob','profile_img'));
    $query = " SELECT * FROM users ORDER BY id DESC";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($result)){
        fputcsv($output,$row);
    }
    fclose($output);
}

//reading csv file '

if(isset($_POST['import_file'])){
    if(empty($_FILES['file'])){
        die("error");
    }
    else{

    
    $temp = $_FILES['file']['tmp_name'];
        $handle = fopen($temp,'r');
        while(($line=fgetcsv($handle, 1000, ","))!==false)
        {
            $sql= "INSERT INTO users (first_name, second_name,email,address,password,dob,profile_img) VALUES ('$line[1]','$line[2]','$line[3]','$line[4]','$line[5]','$line[6]','$line[7]')";
            $result = mysqli_query($con,$sql);

            header('location:index.php');
        }
        fclose($temp);
        die();
    }
    }




/// Adding product detail to database 
if(isset($_POST['product_add'])){
    if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }
        
    if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }
        if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }
        if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }
        if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }
        if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }
        if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }
        if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }
        if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }
        if(empty($_POST['manufacturer_name'])){
            $_SESSION['manufacturer_name']="*Enter Manufacturer Detail";
            exit();

        }else{

            $manufacturer_name = $_POST['manufacturer_name'];
        }


}

?>