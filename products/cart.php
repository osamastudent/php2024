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

        $query =  "SELECT u.name AS user_name, u.email, p.p_name, p.p_price,c.p_quantity ,c.id ,c.user_fk_id,c.product_fk_id FROM cart AS c
        JOIN
         users AS u
          ON
         c.user_fk_id = u.id
        JOIN
         products AS p
          ON
       c.product_fk_id = p.id";

        $result = mysqli_query($connect, $query);
        ?>
        <table class="table text-center">
            <tr>

           

                <thead>
                    <th>index</th>
                    <th>user name</th>
                    <th>user email</th>
                    <th>product name</th>
                    <th>product quantity</th>
                    <th>per product price</th>
                    <th>total price</th>
                </thead>
            </tr>
            <tbody>


                <?php
                if ($result) {
                    $select = mysqli_fetch_array($result);
                    $userId = $_SESSION['id'];
                    $key = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        $matchId = $row["user_fk_id"];
                        if ($matchId === $userId) {
                            $key++;
                
                ?>
                            <tr>
                                <td><?php echo @$key ?></td>
                                <td><?php echo $row["user_name"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php echo $row["p_name"] ?></td>
                                <td><?php echo $row["p_quantity"] ?></td>
                                <td><?php echo $row["p_price"] ?></td>
                                <td><?php echo  $row["p_price"] * $row["p_quantity"] ?></td>
                            </tr>

                <?php
                

                
                        } 
                    }
                    if($key===0){
                        echo '
                        <tr><td colspan="5">No results found...</td></tr>
                                            
                                            ';
                    }
                }

                ?>


            </tbody>
        </table>
 
<div class="div text-end">
<a href="checkout.php" class="btn btn-primary">Proceed To Checkout</a href="">

</div>
        </form>
        <?php

        ?> 
    </div>

</body>

</html>