<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>polymorphism</title>
</head>

<body>

    <div class="container mt-5">

<h1>OOP  polymorphism</h1>

<h5>same operation may be behaive differently in different class</h5>
<h5>ایک ہی آپریشن مختلف کلاس میں مختلف طریقے سے برتاؤ کر سکتا ہے</h5>
<h4>polymorphism ko implement krnay k 2 tareeqay hay. pehla abstract class k through or second interface k through</h4>
<br>
<h1>Using abstract class</h1>

        <?php
abstract class A{
    abstract public function teamName();
}       


class B extends A{
    public function teamName()
    {
        echo "Newzland";
    }
}
class C extends A{
    public function teamName()
    {
        echo "Austrailia";
    }
}


$obj=new B();
echo $obj->teamName();

        ?>
<!-- ///////////////////////////////// -->
        <h1>Using Interface</h1>

        <?php
interface X{
     public function teamName();
}       
interface ODI{
     public function teamCaptain();
}       


class Y implements X,ODI{
    public function teamName()
    {
        echo "Bangladesh";
    }
    public function teamCaptain()
    {
        echo "mushfiq ur raheem";
    }
}
class Z implements X,ODI{
    public function teamName()
    {
        echo "Austrailia";
    }
    public function teamCaptain()
    {
        echo "mitchel marsh";
    }
}


$objforinterface=new Z();
echo $objforinterface->teamName();
echo"<br>";
echo $objforinterface->teamCaptain();

        ?>
    </div>

</body>

</html>