<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>require_include</title>
</head>

<body>
    <div class="container mt-5">
    <div class="card py-2 px-3 mt-5">
<p>
require aur include dono hi PHP mein files ko include karne ke liye istemal hotay hain, lekin unmein chand thore se farq hote hain:

<h3>include: </h3>
<p>
Agar include ki hui file nahi milti, toh PHP warning generate karta hai, lekin script ko aage chalne deta hai. Yani, agar include ki hui file nahi mili toh, script aage chalay ga.
</p>

<h3>require:</h3>
<p>Agar require ki hui file nahi milti, toh PHP fatal error generate karta hai aur script ko rok deta hai. Yani, agar require ki hui file nahi mili toh, script ka execution ruk jayega.</p>
<br><br>
<p>
Tehqiqaat ka muaqam karein ki aap kaam karte waqt kis qisam ki behaviour chahte hain - kya aap ki application ke liye zaroori hai ki file mil jaye, ya aapke liye sirf optional hai. Agar file zaroori hai, toh require istemal karein, warna include ka istemal karein.</p>
</p>

</div>

    </div>
</body>

</html>