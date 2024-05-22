<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>trait</title>
</head>

<body>
    <div class="container mt-5">
        <h1>OOP TRAIT</h1>
        <h6>PHP mai "trait" ka istemal kisi mukhtalif class mai dohraye jane wale common functionality ke liye hota hai. Agar aap kisi feature yaani kisi data ko chahay function ya property ko multiple classes mai use karna chahte hain, to trait ek achha zariya hai. Yeh ek tarah ka code reusability promote karta hai.</h6>


        <?php
        trait commonDataTrait
        {
            function qualification()
            {
                echo "<b>Bachelor required</b>";
            }
        }
        trait commonDataTrait2
        {
            function qualification()
            {
                echo "<b>minimum 1 year required intermeiate </b>";
            }

            private function salaryCount(){
                echo 15000;
            }
        }

        class wordpress
        {
            use commonDataTrait,commonDataTrait2{
commonDataTrait2::qualification insteadOf commonDataTrait;
commonDataTrait::qualification as education;
            }
            function developerNeed()
            {
                echo "we need wordpress developer ";
            }
        }
        class laravel
        {
            use commonDataTrait2{
            commonDataTrait2::salaryCount as public salary;
            }
            function developerNeed()
            {
                echo "we need laravel developer ";
            }

           
        }





        $wordpress=new wordpress();
        echo $wordpress->developerNeed();
        echo $wordpress->qualification();
        echo "<br>";
        echo $wordpress->education();
        echo "<br>";
        $laravel=new laravel();
        echo $laravel->developerNeed();
        echo $laravel->qualification();
        echo "<br>";
        // echo $laravel->salaryCount();
        echo $laravel->salary();

        

        ?>
    </div>

</body>

</html>