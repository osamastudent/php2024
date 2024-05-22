<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>all joins</title>
</head>
<body>
    <div class="container mt-5">
<h1>all joins</h1>
<div class="card py-3 px-4">
    <h4>INNER JOIN / JOIN</h4>
    <b>the mysql inner join select only the same records from both tables</b>
</div>
<div class="card mt-5 py-3 px-4">
    <h4>LEFT JOIN</h4>
    <b>the mysql left join  keyword returns all record from the left table (table1) ,and the matched records from the right table (table2)</b>
</div>
<div class="card py-3 px-4 mt-5">
    <h4>RIGHT JOIN</h4>
    <b>the mysql right join  keyword returns all record from the right table (table2) ,and the matched records from the left table (table2)</b>
</div>

<div class="card py-3 px-4 mt-5">
    <h4>self JOIN</h4>
    <b>same table pr use hot hay yaani 1 hi table pr</b>
</div>
<div class="card py-3 px-4 mt-5">
    <h4>CROSS JOIN</h4>
    <b>cross join combination kelye use kiya jata hay.1 table ki hr rocord dusray table k hr rcord sai combine hota hai.  </b>
    <h3>SELECT * FROM  citycross join students</h3>
    <h3>SELECT * FROM , students</h3>
</div>
<div class="card py-3 px-4 mt-5">
    <h4>union</h4>
    <b>the sql union clause/operator is used to combine/concatenate the results of two or more select statements without returning any duplicate rows and keeps unique records
        <li>the same number of columns selected and expressions</li>
        <li>the same data type</li>
        <li>the columns should be in same ordered</li>
        <br>
        <b>1 tareeqay sai copy krna ka kaaam krta hay</b>
    </b>
    <h4>UNION ALL</h4>
    <b>Select all data from all tables</b>
</div>

<table border="" cellpadding="2px" class="table mt-5">
    <thead>
        <tr>
            <td>index</td>
            <td>city name</td>
            <td>student name</td>
        </tr>
    </thead>

    <tbody>
        <!-- full outer join -->
    <!-- SELECT c.name,s.s_name FROM city as c
LEFT JOIN
students as s
on
s.c_fk_id=c.id
UNION
SELECT c.name,s.s_name FROM city as c
right JOIN
students as s
on
s.c_fk_id=c.id -->

<?php
include '../connection.php';
$select = mysqli_query($connect, "SELECT c.name,s.s_name FROM city as c
JOIN
students as s
on
s.c_fk_id=c.id");
$key=0;
while($row=mysqli_fetch_array($select)){
    $key++;
?>
<tr>
    <td><?php echo $key?></td>
    <td><?php echo $row["name"]?></td>
    <td><?php echo $row["s_name"]?></td>
    <!-- </tr> -->
<?php
}
?>

    
    </tbody>
</table>
    </div>
</body>
</html>

<!-- create table city(
id int auto_increment primary key,
name varchar(50)

)
create table city(
id int auto_increment primary key,
name varchar(50),
c_fk_id int,foreign key(c_fk_id) references city(id);

) -->