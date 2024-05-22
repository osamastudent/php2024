<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>namespace</title>
</head>

<body>
    <div class="container">
        <h1>opp namespace</h1>
        <?php
    //    require 'namespaceclasses.php';
       spl_autoload_register(function($class){
        require $class.".php";
       });

       $obj=new myname\ABCD();
       $objEMail=new myemail\ABCD();
       
       $obj->myName();
       echo "<br>";
       echo $obj->name;

       echo "<br>";
       $objEMail->myEmail();
       echo "<br>";
       
       echo $objEMail->email;

?>


    </div>
</body>

</html>