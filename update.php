<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>update</title>
</head>

<body>

    <div class="container m-5">

    <?php
include('connection.php');

if(isset($_GET["update"])){
    $update_id=$_GET["update"];
    $selectRecord=mysqli_query($connect,"select * from users where id='$update_id'");
    $show_record=mysqli_fetch_array($selectRecord);
}

if (isset($_POST["updateusers"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $image = $_FILES['image']["name"];

    $password_hash=sha1($password);

    $imageUploaded = !empty($image); // Check if a new image is uploaded

    if ($imageUploaded) { // Only perform validation if a new image is uploaded
        $allowedextension = array('jpg','jpeg','png');
        $filename = $_FILES["image"]["name"];
        $pathinfo = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($pathinfo, $allowedextension)) {
            $errorImage = "jpg, PNG and jpeg only";
        } else if ($_FILES["image"]['size'] > 1000000) {
            $errorImage = "image can not allowed more than 1 mb";
        }
    }

    if (empty($name)) {
        $errorName = "Name field is required";
    }

        if ($imageUploaded) {
            // Delete old image if a new one is uploaded
            if (!empty($show_record['image'])) {
                unlink('images/' . $show_record['image']);
            }
            move_uploaded_file($_FILES["image"]["tmp_name"], 'images/' . $image);
            $update_record = mysqli_query($connect, "update users set name='$name', email='$email', password='$password_hash', image='$image' where id='$update_id'");
        } else {
            $update_record = mysqli_query($connect, "update users set name='$name', email='$email', password='$password_hash' where id='$update_id'");
        }

        if ($update_record) {
            header("location:show.php");
            exit; // Exit to prevent further execution
        } else {
            $error = "Failed to update record";
        }
    }
?>

<!-- HTML form goes here -->



        <h1>update form</h1>
        <h3><a href="show.php">show</a></h3>
        <?php
        if (isset($error)) {
            echo $error;
        }

        ?>00
        <form action="" method="post" enctype="multipart/form-data" class="mt-3 mx-auto">
            <input type="text" name="name" value="<?php echo @$show_record['name'] ?>" class="form-control mt-3" placeholder="Name" />
            <?php echo @$errorName ?>
            <input type="text" name="email" value="<?php echo @$show_record['email'] ?>" class="form-control mt-3" placeholder="email" />
            <?php echo @$errorEmail ?>



            <input type="text" value="<?php echo $show_record['password']  ?>" name="password" class="form-control mt-3" placeholder="password" />
            <input type="file" name="image" class="form-control mt-3" placeholder="" />
            <?php echo @$errorImage ?>
            <img src="images/<?php echo $show_record['image'] ?>" height="50" width="50">


            <input type="submit" name="updateusers" value="Update" class="btn btn-primary form-control mt-3" />

            
        </form>

    </div>

</body>

</html>