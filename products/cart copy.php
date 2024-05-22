<?php
include('../connection.php');
session_start();
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

$query = "SELECT u.name , u.email, p.p_name, p.p_price ,c.id  FROM cart AS c
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
        <table class="table">
            <tr>

                <thead>
                    <th>index</th>
                    <th>id</th>
                    <th>user_name</th>
                    <th>user_email</th>
                    <th>product_name</th>
                    <th>product_price</th>
                </thead>
            </tr>
            <tbody>


<?php
if ($result) {
    $key="";
    
    while ($row = mysqli_fetch_array($result)) {
        $key++;
?>

  <tr>
    <td><?php echo @$key?></td>
    <td><?php echo $row["id"]?></td>
    <td><?php echo $row["name"]?></td>
    <td><?php echo $row["email"]?></td>
    <td><?php echo $row["p_name"]?></td>
    <td><?php echo $row["p_price"]?></td>
  </tr>

  <?php
    }
} 

?>


             
            </tbody>
        </table>
    </div>

</body>

</html>