<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="container m-5">

        <?php
        include('connection.php');
        session_start();
        if(isset($_SESSION['email'])){
            header("location:login-new.php");
        
        }
       
        if (isset($_POST["addusers"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $image = $_FILES['image']["name"];

            // $password_hash=password_hash($password,PASSWORD_BCRYPT);
            $password_hash = sha1($password);

            $allowedextension = array('jpg', 'jpeg', 'png');
            $filename = $_FILES["image"]["name"];
            $pathinfo = pathinfo($filename, PATHINFO_EXTENSION);



            if (empty($name)) {
                $errorName = "Name field is required";
            } else if (strlen($name) < 5 || strlen($name) > 10) {
                $errorName = "user name between 5 to 10 characters";
            }
            // else if(empty($email)){
            //     $errorEmail = "Email field is required";
            // }
            else if (empty($image)) {
                $errorImage = "Image field is required";
            } else if (!in_array($pathinfo, $allowedextension)) {
                $errorImage = "jpg, PNG and jpeg only";
            } else if ($_FILES["image"]['size'] > 3500000) {
                $errorImage = "image can not allowed more than 1 mb";
            } else if (file_exists("images/" . $_FILES['image']['name'])) {
                // $filename = $_FILES['image']['name'];
                $errorImage = "image already exists";
            } else {
                $checkEmail = mysqli_query($connect, "select * from users where email='$email'");
                if (mysqli_num_rows($checkEmail) <= 0) {


                    move_uploaded_file($_FILES["image"]["tmp_name"], 'images/' . $image);
                    $insert = mysqli_query($connect, "INSERT INTO users VALUES (null, '$name', '$email', '$password_hash', '$image')");
                    if ($insert) {
                        header("location:show.php");
                    }
                } else {

                    $errorEmail = "this email is already added";
                }
            }
        }
        ?>


        <h1>Registration form</h1>
        <h3><a href="show.php">show</a></h3>
        <h3><a href="login.php">login</a></h3>
        <?php
        if (isset($error)) {
            echo $error;
        }

        ?>
        <form action="" method="post" enctype="multipart/form-data" class="mt-3 mx-auto">
            <input type="text" name="name" class="form-control mt-3" placeholder="Name" />
            <?php echo @$errorName ?>
            <input type="text" name="email" class="form-control mt-3" placeholder="email" />
            <?php echo @$errorEmail ?>



            <input type="text" name="password" class="form-control mt-3" placeholder="password" />
            <input type="file" name="image" class="form-control mt-3" placeholder="" />
            <?php echo @$errorImage ?>

            <input type="submit" name="addusers" value="Submit" class="btn btn-primary form-control mt-3" />

        </form>

    </div>

</body>

</html>