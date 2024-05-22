<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>login</title>
</head>

<body>

    <div class="container m-5">

        <?php
        include('connection.php');
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $select = mysqli_query($connect, "select * from users where email='$email'");
            if (mysqli_num_rows($select) > 0) {
                $row = mysqli_fetch_array($select);
                $check_pass = $row["password"];
                if ($check_pass === $password) {
                    setcookie('email', $email, time() + 60);
                    setcookie('pass', $password, time() + 60);
                    header("location:show.php");
                } else {
                    $errorPass = "unvalid password";
                }
            } else {
                $errorEmail = "user not registered";
            }
        }
        ?>

        <h1>login Form</h1>

        <h3><a href="show.php">show</a></h3>

        <form action="" method="post" class="mt-3 mx-auto">
            <input type="text" name="email" class="form-control mt-3" placeholder="email" />
            <?php echo @$errorEmail ?>


            <input type="text" name="password" class="form-control mt-3" placeholder="password" />
            <?php echo @$errorPass ?>

            <input type="submit" name="login" value="Login" class="btn btn-primary form-control mt-3" />

        </form>

    </div>

</body>

</html>