<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>interface</title>
</head>

<body>
    <div class="container">
        <h1>opp interface</h1>
        <ul>
            <li>interface support multiple inheritance</li>
            <li>interface can contain only  abstract function</li>
            <li>in interface we can not define property like variables</li>
            <li>no constructor in interface</li>
            <li>all function must be public</li>
        </ul>
        <?php



interface  SON{
 public function mobile();
}

interface STW extends SON{
 
 function touch();
public function calculation($a,$b);

}
       


class SS implements SON,STW{
    public function touch()
    {
        echo "this is touch";
    }
public function mobile()
{
    echo "this is mobile";
}
public function laptop()
{
    
}

public function calculation($a, $b)
{
    echo " this is class calculation ". "value of a $a"  . " value of b " . $b;
    
}
}

       
$obj=new SS();

$obj->mobile();
echo "<br>";
$obj->touch();
echo "<br>";
$obj->calculation(10,50);
       
       ?>

       

    </div>
</body>

</html>