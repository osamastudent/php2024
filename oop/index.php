<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>oop index</title>
</head>

<body>
    <div class="container">
        <h1>opp index page</h1>
        <?php

        class SONE
        {
            public $name;
            public $email = "osama123@gmail.com";

            function set_name($name)
            {
                $this->name = $name;
            }
            function get_name()
            {
                return $this->name;
            }


            function set_email($email)
            {
                $this->email = $email;
            }

            function get_email()
            {
                return $this->email;
            }
        }

        class STWO extends SONE {
            public $color;
            public $city;

            function set_color($color)
            {
                $this->color = $color;
            }

            function get_color()
            {
                return $this->color;
            }

            function set_city($city)
            {
                $this->city = $city;
            }

            function get_city()
            {
                return $this->city;
            }
        }

        $Objs1 = new STWO();
        $Objs1->set_name('osama khan ');
        echo $Objs1->get_name();
        echo $Objs1->get_email();
        // $Objs1->set_city("karachi");
        $Objs1->city = " lahore";
        echo $Objs1->get_city();
        ?>

    </div>
</body>

</html>