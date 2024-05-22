<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>arrays</title>
</head>

<body>
    <div class="container mt-5">
    <div class="card py-2 px-3 mt-5">

<h1>Associative  Array</h1>
<b>Associative array mein values ko keys ke zariye store kiya jata hai. Har value apni ek unique key ke saath associate hoti hai.</b>
<h3>example</h3>
<p>
    <b>Yahan "name", "age", aur "gender" keys hain jo kisi student ki info ko represent karti hain.</b>
</p>
<h3>
<p> $student = array("name" => "affan", "age" => 25, "gender" => "male");
</p>

<?php
$student = array("name" => "affan", "age" => 6, "gender" => "male");
echo $student["name"] . " ". $student["age"] . " ". $student["gender"];
?>

</div>
<!-- //////////////////////////////////////// -->
<div class="card py-2 px-3 mt-5">

<h1>Index   Array</h1>
<b>Index array mein values ko 0-based integers se represent kiya jata hai. Matlab, pehli value ka index 0 hota hai, doosri ki 1, aur aise hi chalta hai.</b>
<h3>example</h3>
<h3>
<p>$colors = array("Red", "Green", "Blue");</p>

<?php
$colors = array("Red", "Green", "Blue");
echo $colors[0] ." ";
echo $colors[1] ." ";
echo $colors[2] ." ";
?>

</div>
<!-- /////////////////////////////////////////// -->
    <div class="card py-2 px-3 mt-5">

<h1>Multidimensional Array</h1>
<b>Multidimensional array mein ek array dusre array ke andar hota hai. Yeh arrays arrays mein store kiye jaate hain</b>
<h3>example</h3>
<p>
    <b>Foreach loop ka istemal jab aap arrays ya objects ke elements ke liye iteration karna chahte hain.</b>
</p>
<h3>
<p> $$multiArray = array(</p>

<p>array("Apple", "Banana", "Orange"),</p>
<p>array("Red", "Yellow", "Orange")</p>
<p>);</p>
<p>echo $multiArray[0][0]; // Outputs: Apple</p>
    </h3>

<?php
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
echo "<h1>Multidimensional Associative Array</h1>";

$friendsAssociativeArray = [
["id" => 1, "name" => "osama", "email" => "osama@gmail.com"],
["id" => 2, "name" => "aftab", "email" => "aftab@gmail.com"],
["id" => 3, "name" => "naseer", "email" => "naseer@gmail.com"],
];
echo "<h1>First Method</h1>";
// echo '<h1>';
// echo $friendsAssociativeArray[2]["id"] ." ";
// echo $friendsAssociativeArray[2]["name"] ." ";
// echo $friendsAssociativeArray[2]["email"] ." ";
// echo '</h1>';
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
foreach($friendsAssociativeArray as $rows){
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
echo "<h1>Multidimensional Array</h1>";



$friends = [
    [1, "osama", "osama@gmail.com"],
    [2, "aftab", "aftab@gmail.com"],
    [3, "naseer", "naseer@gmail.com"],
    array(4, "affan janab", "affanjanab@gmail.com"),
    array(5, "janab", "janab@gmail.com"),
    ];



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
echo '<td>' . $friends[$i][0] ."</td>". "<td>". $friends[$i][1] ."</td>" ."<td>". $friends[$i][2]."</td>";
echo '</tr>';

}
echo '</table>';

?>
</div>

    </div>
</body>

</html>