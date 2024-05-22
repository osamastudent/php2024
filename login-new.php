<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>login-new</title>
</head>

<body>

    <div class="container m-5">

        <?php
        include('connection.php');

        session_start();
if(isset($_SESSION['email'])){
    header("location:show.php");
}
        if (isset($_POST["loginusers"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
// $password_hash=password_hash($password,PASSWORD_BCRYPT);
$password_hash=sha1($password);

            $select = mysqli_query($connect, "select * from users where email='$email'");
            $countEmail = mysqli_num_rows($select);
            if ($countEmail) {
                $check_pass = mysqli_fetch_assoc($select);
                $db_pass = $check_pass["password"];
                $db_id = $check_pass["id"];
                // $pass_decode = password_verify($password, $db_pass);
                if ($password_hash===$db_pass) {
                    $_SESSION['id'] = $db_id;
                    $_SESSION['email'] = $email;
                    header("location:show.php");
                } else {
                    $errorPass="passord is invalid";
                }
            }
            else{
                $errorEmail= "user is not registered";
            }
        }

        ?>



        <h1>login-new Form</h1>

        <h3><a href="show.php">show</a></h3>
        <h3><a href="register.php">register</a></h3>

        <form action="" method="post" class="mt-3 mx-auto">
            <input type="text" name="email" class="form-control mt-3" placeholder="email" />
            <?php echo @$errorEmail ?>


            <input type="text" name="password" class="form-control mt-3" placeholder="password" />
            <?php echo @$errorPass ?>

            <input type="submit" name="loginusers" value="Login" class="btn btn-primary form-control mt-3" />

        </form>

    </div>

</body>

</html>