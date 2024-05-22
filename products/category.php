<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>category</title>
</head>

<body>

    <div class="container m-5">

        <?php
        include('../connection.php');
        if (isset($_POST['addcategory'])) {
            $c_name = $_POST['c_name'];
            $insert = mysqli_query($connect, "insert into category values (null,'$c_name')");
            if ($insert) {
                echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span>category added successfully</span>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            
            ';
            }
        }
        ?>


        <h1>Category</h1>

        <h3><a href="../show.php">show</a></h3>

        <form action="" method="post" class="mt-3 mx-auto">
            <input type="text" name="c_name" class="form-control mt-3" placeholder="name" />
            <?php echo @$name ?>



            <input type="submit" name="addcategory" value="submit" class="btn btn-primary form-control mt-3" />

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
if(isset($_GET["delete"])){
$delete_id=$_GET["delete"];
$delete_db=mysqli_query($connect,"delete from category where id='$delete_id'");
if($delete_db){
    echo "delete successfully";
}
}
$select=mysqli_query($connect,"select * from category ORDER BY id DESC" );
$key="";
while($row=mysqli_fetch_array($select)){
    $key++;
    ?>

<tr>
    <td><?php  echo $key ?></td>
    <td><?php echo $row['c_name'] ?></td>
    <td>    <a href="category.php?delete=<?php echo $row[0] ?>" class="btn btn-danger">delete</a>
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