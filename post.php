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

        <div class="wrapper p-3">
            <p class="fs-5 mb-5 fw-bold">পোস্ট করুন</p>


            <form action="post.php" method="POST" enctype="multipart/form-data">

                <div class="mb-4 in-width">
                     <label for="distic" class="text-light">বিভাগ</label> <br />
                        <select name="distic" id="distic" class="form-control">
                            <option selected value="ঢাকা">ঢাকা</option>
                            <option value="চট্টগ্রাম">চট্টগ্রাম</option>
                            <option value="খুলনা">খুলনা</option>
                            <option value="রাজশাহী">রাজশাহী</option>
                            <option value="সিলেট">সিলেট</option>
                            <option value="বরিশাল">বরিশাল</option>
                            <option value="রংপুর">রংপুর</option>
                            <option value="ময়মনসিংহ">ময়মনসিংহ</option>
                        </select>
                </div>

                <div class="mb-4 in-width">
                     <label for="type" class="text-light">রিকোয়ারমেন্ট  টাইপ</label> <br />
                     <select name="type" id="type" class="form-control">
                        <option value="বাসা">বাসা</option>
                        <option value="অফিস">অফিস স্পেস</option>
                        <option value="ব্যাচেলর - পুরুষ">ব্যাচেলর - পুরুষ</option>
                        <option value="ব্যাচেলর - নারী">ব্যাচেলর - নারী</option>
                     </select>
                </div>


                <div class="mb-4 in-width">
                    <label for="area" class="text-light">এরিয়া / সাব এরিয়া</label> <br />
                    <input type="text" name="area" id="area" class="form-control" placeholder="রামপুরা">
                </div>


                <div class="mb-4 in-width">
                    <label for="avail" class="text-light">এভেলেবেল ফ্রম</label> <br />
                    <input type="date" name="avail" id="avail" class="form-control">
                </div>


                <div class="mb-4 in-width">
                    <label for="price" class="form-label">প্রাইস রেঞ্জ</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="৩০০০ - ৪০০০">
                </div>


                <div class="mb-4 in-width">
                    <label for="contact" class="form-label">যোগাযোগের নাম্বার</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="০১৭১১১১১১১১">
                </div>
                


                <div class="mb-4 in-width">
                    <label for="description" class="form-label">বিস্তারিত</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="বিস্তারিত লিখুন"></textarea>
                </div>


                <div class="mb-5 in-width">
                    <label for="image" class="form-label">ছবি</label>
                    <input type="file" class="form-control" id="image" name="image" multiple >
                </div>




                <button type="submit" class="btn btn-success" name="submit">পোস্ট করুন</button>


            </form>




        </div>
    </div>






    <?php myFooter(); ?>
    <script type="text/javascript" src="./src/js/script.js"></script>
</body>
</html>