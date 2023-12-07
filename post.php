<?php

    require_once "./includes/Narvbar.php";
    require_once "./includes/Footer.php";



    session_start();

    if(!isset($_SESSION['name'])){
        header("Location: signin.php");
        exit();
    }

    $ISLOGIN = true;
    $img = $_SESSION['image'];


    // include_once "config.php";
    // $user = $_SESSION['user'];
    // $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = {$user}");
    // if(mysqli_num_rows($sql) > 0){
    //     $row = mysqli_fetch_assoc($sql);
    // }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/assets/fonts/AlinurTumatulFont/stylesheet.css">
    <link rel="stylesheet" href="./src/assets/fonts/sirajiFont/stylesheet.css">
    <link rel="stylesheet" href="./src/css/poststyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>পোস্ট করুন</title>
</head>
<body>
    <div class="container">
        <?php Navbar($ISLOGIN, $img) ?>
        <div class="wrapper">
            <p>পোস্ট করুন</p>

        </div>
    </div>






    <?php myFooter(); ?>
    <script type="text/javascript" src="./src/js/script.js"></script>
</body>
</html>