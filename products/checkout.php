<?php
include('../connection.php');
session_start();
if(isset($_SESSION['email'])){

}
else{
    header("location:../login-new.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>cart</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Cart</h1>
        <?php
if(isset($_POST["order_now"])) {
    $name = $_POST["u_name"];
    $email = $_POST["u_email"];
    $address = $_POST["u_address"];
    $total_products_add = $_POST["total_products"];
    $total_prices_add = $_POST["total_prices"];

    $insert = mysqli_query($connect, "INSERT INTO checkout VALUES(null, '$name', '$email', '$address', '$total_products_add', '$total_prices_add')");
    
    if($insert) {
        $matchId = $_SESSION["id"];
        $delete = mysqli_query($connect, "DELETE FROM cart WHERE user_fk_id='$matchId'");
        $message = "Your Order Has Been Submitted";
    }
}

        $query="SELECT p.p_name,p.p_price,c.p_quantity, c.user_fk_id, c.product_fk_id FROM cart AS c
        JOIN
        users AS u
        ON
        c.user_fk_id=u.id
        JOIN
        products AS p
        ON
        c.product_fk_id=p.id
         ";
$select=mysqli_query($connect,$query);

while($row=mysqli_fetch_array($select)){
    
    $fecthId=$row["user_fk_id"];
?>
<h6><?php
$matchId=$_SESSION["id"];
if($matchId===$fecthId){
    // echo $row["p_name"]. '(' . $row["p_quantity"] . ')' . '&nbsp;' . $row["p_price"] * $row["p_quantity"];

    @$total_products.=$row["p_name"] . '('. $row["p_quantity"] .')' ;
    @$total_prices+=$row["p_price"]*$row["p_quantity"] ;
    
}
else{
    @$total_products.="";
    @$total_prices+=0;
}
 
?></h6>


<?php
}
?>

<?php
if(isset($message)){
echo $message;
}
?>
<div class="card p-3">
<?php  echo $total_products ?>
</div>
             <form action="" method="post">
<input type="hidden" name="total_products" value="<?php echo $total_products ?>">
<input type="hidden" name="total_prices" value="<?php echo $total_prices ?>">
 <input type="text" name="u_name" class="form-control mt-3" placeholder="Name">
 <input type="text" name="u_email" class="form-control mt-3" placeholder="Email">
 <textarea name="u_address" class="form-control mt-3" placeholder="Address" cols="30" rows="3"></textarea>
<button type="submit" name="order_now" class="btn btn-primary mt-3">Order Now</button>
        </form>
        <?php

        ?> 
    </div>

</body>

</html>