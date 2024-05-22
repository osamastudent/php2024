<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Construct</title>
</head>

<body>
    <div class="container">
        <h1>opp Construct</h1>
        <?php

        class s1
        {
            public $name;
            public $color;
            public $x;

            function __destruct()
            {
                echo "this is __destruct " . $this->name;
                echo $this->x = 100;
            }

            function __construct($name, $color)
            {
                echo "this is __construct <br> $name " . $name;
                $this->name = $name;
                $this->color = $color;
            }

            function get_name()
            {
                return $this->name;
            }

            function get_color()
            {
                return $this->color;
            }
        }

        $obj = new s1("affan ", " green");
        echo $obj->get_name();
        echo $obj->get_color();

        ?>

    </div>
</body>

</html>