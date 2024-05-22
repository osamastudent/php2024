<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>showproducts</title>
</head>
<body>
<?php
include '../connection.php';
$select=mysqli_query($connect,"select * from cart");
// $row=mysqli_fetch_array($select);
$count=mysqli_num_rows($select)
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <a href="cart.php" class="btn btn-primary position-relative mx-1 mt-1">
  Cart
  <span class="position-absolute top-0 start-100 translate-middle px-1 py-0 bg-danger border border-light rounded-circle">
    <span class=""><?php echo $count ?></span>
  </span>
</a>  
    </div>
  </div>
</nav>



<!-- container start -->
<div class="container mt-5">
    
        <?php
        
        include('../connection.php');
session_start();
@$id=$_SESSION['id'];
if(isset($_POST['addtocart'])){
$p_quantity=$_POST['p_quantity'];
$user_id=$_POST['user_fk_id'];
$product_id=$_POST['product_fk_id'];

$insert=mysqli_query($connect,"insert into cart values(null,'$p_quantity','$user_id','$product_id')");
header("location:showproducts.php");
}

        $select=mysqli_query($connect,"select * from products");
        ?>
<div class="row">

        <?php
        while($row=mysqli_fetch_array($select)){
    ?>

    <div class="col-3  mt-3">
    <div class="card text-center">
  <img src="images/<?php echo $row['p_image'] ?>" height="200px" width="200px" class="card-img-top" alt="...">
  <div class="card-body ">
    <h5 class="card-title"><?php echo $row['p_name']  ?></h5>
    <p class="card-text"><?php echo $row['p_price']  ?></p>
   <form  action="" method="post">
   <input type="hidden" name="user_fk_id" value="<?php echo @$id ?>" />
   <input type="hidden" name="product_fk_id" value="<?php echo $row[0] ?>" />
   <input type="number" name="p_quantity" value="" />
    <button type="submit" name="addtocart" class="btn btn-primary">add to cart</button>
   </form>
  </div>
</div>
    </div>



<?php
}
        ?>
</div>

        
    </div>
    
</body>
</html>