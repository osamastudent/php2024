<?php
        include('../connection.php');
       function selectCategory(){
        include('../connection.php');

        $dropdown=mysqli_query($connect,"select * from category");
$option="";
       while($row=mysqli_fetch_array($dropdown)){
        $option .="<option value=".$row[0].">$row[1]</option>";
       }
       echo $option;
       }
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>products</title>
</head>

<body>

    <div class="container m-5">
<?php
if(isset($_POST["addproducts"])){
$category_fk_id=$_POST["category_fk_id"];
$name=$_POST["p_name"];
$price=$_POST["p_price"];
$image=$_FILES['p_image']["name"];

$allowedExtention=array("jpg","jpeg");
$fileName=$_FILES["p_image"]["name"];
$pathInfo=pathinfo($fileName,PATHINFO_EXTENSION);

if(empty($name)){
    $errorName="Name Field is required";
}
else if(empty($category_fk_id)){
    $errorCategry="category field is required";
}
else if(empty($price)){
    $errorPrice="price field is required";
}
else if(!in_array($pathInfo,$allowedExtention)){
$errorImg= "jpg and jpeg only";
}
else{
    
move_uploaded_file($_FILES["p_image"]["tmp_name"],'images/'.$image);
$insert=mysqli_query($connect,"insert into products values (null,'$category_fk_id','$name','$price','$image')");
if($insert){
    echo  '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <span>products added successfully</span>
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    }
    
}
}


?>
  


        <h1>products</h1>
        <h3><a href="../show.php">show</a></h3>
        <h3><a href="../products/category.php">category</a></h3>
        <h3><a href="../login.php">login</a></h3>
        <h3><a href="../products/showproducts.php">showproducts</a></h3>
       
        <form action="" method="post" enctype="multipart/form-data" class="mt-3 mx-auto">
        <select name="category_fk_id" class="form-select" aria-label="Default select example">
  <option value="" selected>Open this select menu</option>
  <?php selectCategory() ?>
  
</select>
<?php echo @$errorCategry?>

            <input type="text" name="p_name" class="form-control mt-3" placeholder="Name" />
            <?php echo @$errorName ?>
            
            <input type="text" name="p_price" class="form-control mt-3" placeholder="price" />
            <?php echo @$errorPrice ?>


            <input type="file" name="p_image" class="form-control mt-3" placeholder="" />
<?php
echo @$errorImg;
?>
            <input type="submit" name="addproducts" value="Submit" class="btn btn-primary form-control mt-3" />

        </form>
        <br>
        <table class="table">
        <tr>
            <thead>
                <th>Index</th>
                <th>Name</th>
                <th>Actions</th>
            </thead>
        </tr>


        <tbody>
<?php
if (isset($_GET["delete"])) {
    $delete_id = $_GET["delete"];

    // Select the record to get the image filename
    $select_record = mysqli_query($connect, "SELECT * FROM products WHERE id='$delete_id'");
    $show_Record = mysqli_fetch_array($select_record);
    
    // Check if the record exists and if it has an associated image
    if (!empty($show_Record["p_image"])) {
        // Remove the image file
        unlink('images/' . $show_Record["p_image"]);
    }

    // Delete the record from the database
    $delete = mysqli_query($connect, "DELETE FROM products WHERE id='$delete_id'");
    if ($delete) {
        header("location: products.php");
        exit(); // Ensure no further output is sent after redirect
    }
}

$select=mysqli_query($connect,"select * from products" );
$key="";
while($row=mysqli_fetch_array($select)){
    $key++;
    ?>

<tr>
    <td><?php  echo $key ?></td>
    <td><?php echo $row['p_name'] ?></td>
    <td><?php echo $row['p_price'] ?></td>
    <td><?php echo $row['p_price'] ?></td>
    <td><img src="images/<?php echo $row["p_image"] ?>" alt="" height="50px" width="50px"></td>
    <td>    <a href="products.php?delete=<?php echo $row[0] ?>" class="btn btn-danger">delete</a>
</td>
</tr>


<?php
}

?>
        </tbody>
        </table>


    </div>

</body>

</html>