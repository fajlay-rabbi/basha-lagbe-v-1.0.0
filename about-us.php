<?php

    require_once "./includes/Narvbar.php";
    require_once "./includes/Footer.php";

    session_start();

    $ISLOGIN = false;
    $img = '';

    if(isset($_SESSION['name'])){
        $ISLOGIN = true;
        $img = $_SESSION['image'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./src/assets/fonts/AlinurTumatulFont/stylesheet.css">
    <link rel="stylesheet" href="./src/assets/fonts/sirajiFont/stylesheet.css">

    <link rel="stylesheet" href="./src/css/aboutstyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>
        আমাদের সম্পর্কে
    </title>
</head>
<body>
    <div class="container">
        <?php Navbar($ISLOGIN, $img) ?>

        <div class="wrapper">
            <h2>আমাদের সম্পর্কে</h2>

            <p>স্বাগতম! আমাদের হোম রেন্টাল ওয়েবসাইটে। আমরা একটি সহজ এবং সুরক্ষিত হোম রেন্টাল প্ল্যাটফর্ম প্রদান করি, যেখানে লোকজন তাদের বাসা ভাড়া দেয়ার জন্য তাদের বিজ্ঞাপন পোস্ট করতে পারে।</p>

            <p>আমাদের লক্ষ্য হল আপনাদের সুবিধায় এবং আপনার প্রয়োজনে সমর্থক হতে সাহায্য করা। আপনি একটি বাসা অনুসন্ধান করতে বা আপনার বাসা ভাড়া দেওয়ার জন্য এখানে সাইন আপ করতে পারেন এবং সহজেই তাদের সাথে যোগাযোগ করতে পারেন।</p>

            <h3>আমাদের লক্ষ্য</h3>

            <p>আমরা ব্যক্তিগত, সুরক্ষিত এবং সাহায্যকর অভিজ্ঞান প্রদান করতে দৃঢ়ভাবে মোতিব। আমরা মানুষদের একে অপরকে বোঝার জন্য এবং সহজেই অভিজ্ঞান অংশগ্রহণ করার জন্য একটি সামাজিক প্ল্যাটফর্ম তৈরি করতে চাই।</p>

            <h3>কেন আমাদের?</h3>

            <p>আমাদের প্ল্যাটফর্ম ব্যবহার করে আপনি আপনার প্রতিষ্ঠান, বা স্বত্ত্বাধীন বাসা ভাড়া দিতে সহজেই বিজ্ঞাপন দিতে পারবেন। এটি একটি সহজ প্রক্রিয়ায় আপনার বাসা একত্রে তোলা এবং আপনার লক্ষ্যমূলক ভাড়া বের করা হবে।</p>

            <p>একে অপরকে পুরোপুরি বোঝার জন্য এবং সহজে যোগাযোগ করার জন্য আমরা একটি সহযোগিতা ভিত্তিক সম্প্রদায় তৈরি করতে সক্ষম।</p>

            <p>আমাদের সাথে থাকার জন্য ধন্যবাদ!</p>

        </div>
        


        <?php myFooter(); ?>
    </div>
    





    <script src="./src/js/script.js"></script>
</body>
</html>