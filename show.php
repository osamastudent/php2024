<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Show</title>
</head>

<body>

    <?php
    include('connection.php');
    session_start();
    $count_users = mysqli_query($connect, "select * from users");
    $count_users_now = mysqli_num_rows($count_users);
    ?>

    <div class="container m-5">
        <?php

        if (isset($_SESSION['email'])) {
        } else {
            header("location:login-new.php");
        }

        if (isset($_SESSION["email"]))
            echo "here" . $_SESSION['email'];
        ?>
        <h3><a href="oop/tables.php">tables</a></h3>
        <h3><a href="oop/alljoins.php">alljoins</a></h3>
        <h3><a href="oop/index.php">index</a></h3>
        <h3><a href="oop/encapsulation.php">encapsulation</a></h3>
        <h3><a href="oop/abstract.php">abstract</a></h3>
        <h3><a href="oop/polymorphism.php">polymorphism</a></h3>
        <h3><a href="oop/interface.php">interface</a></h3>
        <h3><a href="oop/construct.php">Construct</a></h3>
        <h3><a href="oop/over_riding.php">over_riding</a></h3>
        <h3><a href="oop/static.php">static</a></h3>
        <h3><a href="oop/trait.php">trait</a></h3>
        <h3><a href="oop/namespace.php">namespace</a></h3>
        <h3><a href="oop/loops.php">loops</a></h3>
        <h3><a href="oop/arrays.php">arrays</a></h3>
        <h3><a href="oop/require_include.php">require_include</a></h3>

        <h3><a href="products/showproducts.php">showproducts</a></h3>
        <h3><a href="register.php">register</a></h3>
        <h3><a href="products/products.php">Add Pproducts</a></h3>
        <h3><a href="products/category.php">category</a></h3>
        <h3><a href="logout.php">logout</a></h3>
        <h3><a href="show.php">show</a></h3>
        <h3><a href="login.php">login</a></h3>
        <h3><a href="login-new.php">login-new</a></h3>
        <h1>total: <strong>(<?php echo @$count_users_now ?>)</strong></h1>
        <form action="" method="GET">
            <div class="input-group">
                <input type="text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" class="form-control">

                <button>Search</button>
            </div>
        </form>


        <table class="table">
            <tr>
                <thead>
                    <th>Index</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Image</th>
                    <th>Actions</th>
                </thead>
            </tr>
            <tbody>
                <?php
                // delete all
                if (isset($_GET["deleteall"])) {
                    $deleteall = $_GET["deleteall"];


                    $select_record = mysqli_query($connect, "select * from users");

                    while ($row = mysqli_fetch_array($select_record)) {
                        if (!empty($row['image'])) {
                            unlink("images/" . $row['image']);
                        }
                    }
                    $deleteallUsers = mysqli_query($connect, "delete from users");
                    header("location:show.php");
                }


                // delete single
                if (isset($_GET["delete"])) {
                    $delete_id = $_GET['delete'];

                    // Fetch the record to get the image filename
                    $selectRecord = mysqli_query($connect, "select * from users where id='$delete_id'");
                    $show_record = mysqli_fetch_array($selectRecord);

                    // Check if an image exists for the record
                    if (!empty($show_record['image'])) {
                        // Delete the image file
                        unlink('images/' . $show_record['image']);
                    }

                    // Delete the record from the database
                    $deleted = mysqli_query($connect, "delete from users where id='$delete_id'");

                    if ($deleted) {
                        header("location:show.php");
                        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data has been deleted
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
                    }
                }


                // laravel
                // $records = YourModel::all();
                // $totalRecords = $records->count();
                // $halfRecords = (int) ($totalRecords / 2); // Get half of the total records

                // $selectedRecords = YourModel::take($halfRecords)->get();


                if(isset($_GET["search"]))
                $search=$_GET["search"];
                if(!empty($search)){
                $findData=mysqli_query($connect,"SELECT * FROM users WHERE  CONCAT(email,name) LIKE '%$search%'");
                if(mysqli_num_rows($findData)>0){
                while($row=mysqli_fetch_array($findData)){
                    echo $row[1];
                }
                }
                else{
                    echo "No Record Found";
                }
                }


                $totalRecordsQuery = mysqli_query($connect, "SELECT COUNT(*) AS total FROM users");
                $totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];
                // Calculate 50% of total records
                // $halfRecords = ceil($totalRecords / 2);

                $halfRecords = ceil($totalRecords * 0.5);


                // Fetch 50% of the records
                $fetchData = mysqli_query($connect, "SELECT * FROM users ORDER BY ID DESC LIMIT $halfRecords");

                // $fetchData = mysqli_query($connect, "select * from users");

                $key = "";

                while ($row = mysqli_fetch_array($fetchData)) {
                    $key++;
                ?>
                    <tr>
                        <td><?php echo $key ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td>
                            <img src="images/<?php echo $row['image'] ?>" height="50" width="50">
                        </td>
                        <td>
                            <a href="update.php?update=<?php echo $row[0] ?>" class="btn btn-warning">Update</a>
                            <a href="show.php?delete=<?php echo $row[0] ?>" class="btn btn-danger">delete</a>
                            <a href="show.php?deleteall=<?php echo $row[0] ?>" class="btn btn-danger">delete all</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="card p-3">
            <h5>

                <p>$totalRecordsQuery = mysqli_query($connect, "SELECT COUNT(*) AS total FROM users");</p>
                <p>$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];</p>
                <p>// Calculate 50% of total records</p>
                <p>// $halfRecords = ceil($totalRecords / 2);</p>
                <p>$halfRecords = ceil($totalRecords * 0.5);</p>

                <p>// Fetch 50% of the records</p>
                <p>$fetchData = mysqli_query($connect, "SELECT * FROM users ORDER BY ID DESC LIMIT $halfRecords");</p>
            </h5>
        </div>

    </div>

</body>

</html>