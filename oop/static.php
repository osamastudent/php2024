<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Static</title>
</head>

<body>
    <div class="container">
        <h1>opp Static</h1>
        <?php
        class SONEEE
        {
            static public $name = "affan ";

            static function abc()
            {
                echo "this is static from SONEEE <br> "  .self::$name;
                echo "this is static from SONEEE "  .self::$name;
            }
        }
        class STWOO extends SONEEE
        {  
            static public $name = "affan ";

            static function xyz()
            {
                echo "this is static "  .self::$name;
        echo "<br>";

                echo "this is static "  .parent::$name;
            }
        }



        echo        SONEEE::$name;
        echo "<br>";

        echo        SONEEE::abc();
        echo "<br>";
        echo        STWOO::xyz();


        ?>


    </div>
</body>

</html>