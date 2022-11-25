<?php
session_start();

include 'database.php';
$id= $_GET['product_update'];
$sql= "SELECT * FROM products WHERE product_id=$id";
$results = mysqli_query($con,$sql);
$row= mysqli_fetch_assoc($results);
$manufacturer_name= $row['manufacturer_name'];
$medicine_name= $row['medicine_name'];
$generic_name= $row['generic_name'];
$strength= $row['strength'];
$category_name= $row['category_name'];
$manufacturer_price= $row['manufacturer_price'];
$sale_price= $row['sale_price'];
$pe_no= $row['pe_no'];
$unit= $row['unit'];
$medicine_type= $row['medicine_type'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="public/assets/style.css">
    <title>Document</title>
</head>
<body>
<div class="container">

<form class="well form-horizontal" action="api.php" method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Update Product</b></h2></center></legend><br>

<!-- Text input-->
<input type="hidden" name="id" value="<?php echo "$id"?>">

<div class="form-group">
<label class="col-md-4 control-label">Manufacturer Name</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="manufacturer_name" value = "<?php echo "$manufacturer_name"?>" placeholder="Add Manufacturer Name" class="form-control"  type="text">
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label" >Medicine Name</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="medicine_name" value = "<?php echo "$medicine_name"?>" placeholder="Add Medicine Name" class="form-control"  type="text">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label" >Generic Name</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="generic_name" value = "<?php echo "$generic_name"?>" placeholder="Add Generic Name" class="form-control"  type="text">
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label">Strength</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="strength" value = "<?php echo "$strength"?>" placeholder="Add Strength" class="form-control"  type="text">
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label" >Catrgory Name</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="category_name" value = "<?php echo "$category_name"?>" placeholder="Add Category Namee" class="form-control"  type="text">
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col-md-4 control-label" >Manufacturer Price</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="manufacturer_price" value = "<?php echo "$manufacturer_price"?>" placeholder="Add Manufacturing price" class="form-control"  type="text">
</div>
</div>
</div>

<!-- Text input-->
   <div class="form-group">
<label class="col-md-4 control-label">Sale Price</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input name="sale_price" value = "<?php echo "$sale_price"?>" placeholder="Add Sale price" class="form-control"  type="text">
</div>
</div>
</div>


<!-- Text input-->
   
<div class="form-group">
<label class="col-md-4 control-label">P.E No.</label>  
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
<input name="pe_no" value = "<?php echo "$pe_no"?>" placeholder="Add P.E No" class="form-control" type="text">
</div>
</div>
</div>


<div class="form-group">
<label class="col-md-4 control-label" >Unit</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="unit" value = "<?php echo "$unit"?>" placeholder="Add Unit of Medicine" class="form-control"  type="text">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label" >Medicine Type</label> 
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="medicine_type" value = "<?php echo "$medicine_type"?>" placeholder="Add Type of Mdedicine" class="form-control"  type="text">
</div>
</div>
</div>


<!-- Select Basic -->


<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4"><br>
<button type="submit" name="update_product" class="btn btn-warning" >Update <span class="glyphicon glyphicon-send"></span></button>
</div>
</div>

</fieldset>
</form>
</div>
</div><!-- /.container -->
</body>
</html>