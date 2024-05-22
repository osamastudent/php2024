<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>loops</title>
</head>

<body>
    <div class="container mt-5">
        <h2>While, do-while, for, aur foreach loop PHP mein repetition (dohrao) ke liye istemal hotay hain. In mein kuch farqat hain:</h2>

        <div class="card py-2 px-4 mt-5">

            <h1>while loop</h1>
            <b>While loop mein pehle condition ko check kiya jata hai , agar condition true hoti hai to loop execute hota hai. Phir har iteration ke baad condition ko dobara check kiya jata hai, agar condition false ho jati hai to loop khatam ho jata hai.</b>

            <div class="div m-5">
                <h5>example:</h5>
                <p><b>While loop ka istemal jab aapko ek condition ke mutabiq iteration karna hai, aur aapko pehle se pata nahi hai ke kitni baar iteration karni hogi.</b>
                </p>
                <h3>

                    <p>$i = 1;</p>
                    <p>while ($i <= 5) {</p>
                            <p>echo "Number: $i ";</p>
                            <p>$i++;</p>
                            }

                </h3>

                <?php
                $i = 1;
                while ($i <= 5) {
                    echo "Number: $i <br>";
                    $i++;
                }

                ?>
            </div>
        </div>



        <div class="card py-2 px-3 mt-5">

            <h1>Do-While Loop</h1>
            <b>Do-while loop mein pehle code execute hota hai phir condition check ki jati hai. Agar condition true hoti hai to loop phir se execute hota hai, phir har iteration ke baad condition ko dobara check kiya jata hai. Agar condition false ho jati hai to loop khatam ho jata hai.</b>

            <div class="div m-5">
                <h5>exapmple</h5>
                <p>
                    <b>Do-while loop ka istemal jab aapko kam se pehle ek bar execute karna hai phir condition check karna hai.</b>
                </p>
                <h3>
                    <p>$i = 1;</p>
                    <p>do {</p>
                    <p>echo "Number: $i";</p>
                    <p>$i++;</p>
                    <p>} while ($i <= 5);</p>
                </h3>
                <?php
                $i = 1;
                do {
                    echo "Number: $i <br>";
                    $i++;
                } while ($i <= 5);


                ?>

            </div>
        </div>


        <div class="card py-2 px-3 mt-5">

            <h1>for Loop</h1>
            <b>For loop mein hum ek initialization statement, ek condition, aur ek increment/decrement statement ka istemal karte hain. For loop tab istemal hota hai jab aapko pata hai ke aapko kitni baar iteration karni hai.</b>

            <h3>example</h3>
            <p>
                <b>For loop ka istemal jab aapko pehle se pata hai ke kitni baar iteration karni hai.</b>
            </p>
            <h3>
            <p>for ($i = 1; $i <= 5; $i++) {</p>
    <p>echo "Number: $i";</p>
<p>}</p>

            </h3>
            

   <?php
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i <br>";
}

   ?>

            
        </div>

        <div class="card py-2 px-3 mt-5">

            <h1>Foreach Loop</h1>
            <b>Foreach loop arrays aur objects par kaam karta hai. Ye loop array ya object ke har element ke liye ek bar code ko execute karta hai.</b>
            <h3>example</h3>
            <p>
                <b>Foreach loop ka istemal jab aap arrays ya objects ke elements ke liye iteration karna chahte hain.</b>
            </p>
<h3>
<p> $colors = array("Red", "Green", "Blue", "Yellow");</p>

<p>foreach ($colors as $color) {</p>
<p>echo "$color";</p>
<p>}</p>

</h3>

<?php
echo "<h1>PHP Multidimensional Array</h1>";
// $multiArray = array(
//     array("Apple", "Banana", "Orange"),
//     array("Red", "Yellow", "Orange")
// );
// echo $multiArray[0][0];

echo "<br>";
$colors = array("Red", "Green", "Blue", "Yellow");
foreach ($colors as $color) {
    echo "$color <br>";
}
$friends = [
    ["id" => 1, "name" => "osama", "email" => "osama@gmail.com"],
    ["id" => 2, "name" => "aftab", "email" => "aftab@gmail.com"],
    ["id" => 3, "name" => "naseer", "email" => "naseer@gmail.com"],
];
echo "<h1>First Method</h1>";
echo '<h1>';
echo $friends[2]["id"] ." ";
echo $friends[2]["name"] ." ";
echo $friends[2]["email"] ." ";
echo '</h1>';
echo '<table class="table">';
echo'
<tr>
    <thead>
    <th>id</th>
    <th>name</th>
    <th>email</th>
    </thead>
</tr>
';
foreach($friends as $rows){
echo "<tr>";
foreach($rows as $col){
echo '<td>'; 
echo $col;
echo '</td>';
}
echo "</tr>";
}
echo '</table>';



echo "<h1>Second Method</h1>";

echo '<table class="table">';
echo'
<tr>
    <thead>
    <th>id</th>
    <th>name</th>
    <th>email</th>
    </thead>
</tr>
';

for($i=0; $i<count($friends); $i++){
    echo '<tr>';
    echo '<td>' . $friends[$i]['id'] ."</td>". "<td>". $friends[$i]['name'] ."</td>" ."<td>". $friends[$i]['email']."</td>";
    echo '</tr>';

}
echo '</table>';

?>
</div>
    </div>
</body>

</html>