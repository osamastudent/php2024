<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>over riding</title>
</head>

<body>
    <div class="container">
        <h1>opp abstract</h1>
        <h3> over riding</h3>
        <p>
            <b>agr prototype same ho or  scope  diffrent ho so that is called over riding.</b>
        </p>
        <?php

        class SONEE
        {
            public $name = "osama ";

            function email()
            {
                echo "this is email ";
            }

            function calc($n, $m)
            {
                return "this is from SONEE " . $n * $m;
            }
        }

        class STWOE extends SONEE
        {

            public $name = "osama ";
            function emailNew()
            {
                echo "this is email ";
            }

            function calc($n, $m)
            {
                return "this is from STWOE ". $n + $m;
            }
        }



        $obj = new STWOE();
        echo $obj->name;
        echo $obj->email();


        ?>

        <h3>over loading</h3>
        <p>
            <b>agr prototype or number of arguments different ho or scope  same ho so that is called overloading.</b>
        </p>
<h5>
    <b>number of parameters are diffrent</b> <br>
display(int a, int b) &nbsp; &nbsp; display($a,$b)
<br>
display(int a, int b,int c) &nbsp; &nbsp; display($a,$b,$c)
</h5>
<br>
<h5>
    <b>data types of parameters are different if number of parameters are same</b> <br>
 display($a,$b)
<br>
display(double a, double b)

</h5>
<br>


        <?php
        class STHREE
        {
            public $a = 10;

            function cal($x, $y)
            {
                echo $x * $y;
            }
        }

        class FOUR extends STHREE
        {
            public $a = 50;
        }


        $obj = new STHREE();
        $obj1 = new SONEE();
        $obj2 = new STWOE();
        echo $obj->a;

        echo "<br>";
        echo $obj1->calc(5,5);
        echo "<br>";
        echo $obj2->calc(5,5);


        ?>


    </div>
</body>

</html>