<?php
include 'database.php';

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
<form action="api.php" method= "post" > 
    <div class="row">
        <div class="btn float-right .text-right">
            
        <button type="submit" name= "export_products_data" value= "CSV Export" class="btn btn-primary">EXPORT Data</button>
        </div>
    </div>   
        
    </form>
    <form action="api.php" method= "post"  enctype="multipart/form-data">
    <div class="row">
        <div class="btn float-right .text-right">
            
            <a href="api.php"><input type="file" name= "file"></a>
            <button type="submit" name= "import_products" value= "CSV import" class="btn btn-primary">Import file</button>
        
        </div>
    </div>
    </form>
<table class="table table-dark table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Manufacturer Name</th>
              <th scope="col">Medicine Name</th>
              <th scope="col">Generic Name</th>
              <th scope="col">Strength</th>
              <th scope="col">Category Name</th>
              <th scope="col">Manufacturer Name</th>
              <th scope="col">Sale Price</th>
              <th scope="col">P.E. No.</th>
              <th scope="col">Units</th>
              <th scope="col">Medicine Type</th>
              <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>


    
<?php 


    $sql = "SELECT * FROM products";
    $results = mysqli_query($con,$sql);
    $i= 0;
    if($results){
        while($row= mysqli_fetch_assoc($results)){
            $id= $row['product_id'];
            $i++;
            $manufacturer_name= $row['manufacturer_name'];
            $medicine_name= $row['medicine_name'];
            $generic_name= $row['generic_name'];
            $strength= $row['strength'];
            $category_name = $row['category_name'];
            $manufacturer_price= $row['manufacturer_price'];
            $sale_price= $row['sale_price'];
            $pe_no= $row['pe_no'];
            $unit= $row['unit'];
            $medicine_type= $row['medicine_type'];
            
            echo ' 
          
            <tr>
              <th scope="row">'.$i.'</th>
              <td>'.$manufacturer_name.'</td>
              <td>'.$medicine_name.'</td>
              <td>'.$generic_name.'</td>
              <td>'.$strength.'</td>
              <td>'.$category_name.'</td>
              <td>'.$manufacturer_price.'</td>
              <td>'.$sale_price.'</td>
              <td>'.$pe_no.'</td>
              <td>'.$unit.'</td>
              <td>'.$medicine_type.'</td>

              <td>
            
            <a href="update_product.php?product_update='.$id.' "><button class = "btn btn-primary">Update</button></a>
            
            <a href="api.php?product_delete='.$id.' "><button class = "btn btn-danger">Delete</button> </a>
        </td>
            </tr>
            
            ';
        
        }
    
    }

?>

</tbody>
</table>


</body>
</html>