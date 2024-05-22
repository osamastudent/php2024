<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>encapsulation</title>
</head>

<body>
    <div class="container">
        <h1>opp encapsulation</h1>
<p><b>data ko secuity provide krnay kelye use hota hay yaani data ko secure krnay kelye use kiya jata hay</b></p>
<p><b>aap isko bahir say access bhi nahi kr sktay or change bhi kr sktay</b></p>

<?php
class A{
protected $name;
function __construct()
{
    $this->name="affan janab ";
}

function setName(){
    $this->name="osama janab updated";
}

function getName(){
   return $this->name;
}


}




echo "<h4>example (01)</h4>";
$obj=new A();
// echo $obj->name="kkk";
echo $obj->setName();
echo $obj->getName();

echo "<br><br><br>";
echo "<h4>example (02)</h4>";



class B  {
private $number;

function __construct(){
$this->number=100;
echo "private data ko derived class  access nahi krskta <br>";
}


protected function getNum(){
    return $this->number;
}
   
}

class C extends B{
public function show(){
    return $this->getNum();
}
}

$obj2=new C();
// echo $obj2->number;
echo $obj2->show();
?>


    </div>
</body>

</html>