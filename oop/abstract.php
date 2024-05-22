<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>abstract</title>
</head>

<body>
    <div class="container">
        <h1>opp abstract</h1>
        <ul>
            <li>abstract class contain atlest 1 abstract function</li>
            <li>abstract function must declare but not implement </li>
            <li>abstract class could not create object </li>
            <li>abstract class,child class must contain abstract function</li>
        </ul>
        <?php
abstract class SONE{
abstract function mobile();
abstract protected function laptop();
abstract protected function calculation($a,$b);
}

class STWO extends SONE{
 function mobile()
{
    echo "this is mobile ";
}
public function laptop(){
    echo "this si laptop ";
}
 
public function calculation($a,$b){
echo $c=$a+$b;
$n=10;
$m=5;

echo " multiplication ". "(".$nm=$n*$m .")";
}

}
       
       
$obj=new STWO();
echo $obj->mobile();
echo $obj->laptop();
echo $obj->calculation(50,60);
       
       
       ?>

       

    </div>
</body>

</html>