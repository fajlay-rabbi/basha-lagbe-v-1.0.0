<?php 
    require_once "./includes/Narvbar.php";
    require_once "./includes/Footer.php";
    require_once "./includes/DB.Config.php";

    session_start();

    $ISLOGIN = false;
    $img = '';

    if(isset($_SESSION['name'])){
        $ISLOGIN = true;
        $img = $_SESSION['image'];
    }


    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT * FROM `post` WHERE `id` = '$id'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            $division = ucwords($row['division']);
            $area = ucwords($row['area']);
            $type = ucwords($row['type']);
            $availableDate = $row['availableDate'];
            $price = $row['price'];
            $number = $row['number'];
            $description = $row['description'];
            $image = $row['image'];
            $post_date = $row['post_date'];

        }

        $imgArray = explode(', ', $image);

    }

    
    // add to wishlist
    if (isset($_GET['add']) && $ISLOGIN) {
        $id = $_GET['add'];

        $user_id = $_SESSION['id'];

        $sql = "INSERT INTO `wishlist`(`post_id`, `user_id`) VALUES ('$id', '$user_id')";

        if(mysqli_query($con, $sql)){
            header("Location: post-details.php?id=$id");
            exit();
        } else{
            echo "<script>alert('পোস্টটি উইশলিস্টে যোগ করা হয়নি।')</script>";
        }

    }

?>


<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বিস্তারিত দেখুন</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link rel="stylesheet" href="./src/css/postdetailsstyle.css">

    <link rel="stylesheet" href="./src/assets/fonts/AlinurTumatulFont/stylesheet.css">
    <link rel="stylesheet" href="./src/assets/fonts/sirajiFont/stylesheet.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
    <?php Navbar($ISLOGIN, $img) ?>

    <div class="container">

        <div class="img-sec">

            <div class="title-container">

                <div class="title">
                <i class="fa-regular fa-image"></i>
                <p class="fw-bold">ইমেজ</p>
                </div>

                <div class="wish">
                    <div><i class="fa-regular fa-heart"></i></div>
                    <div>
                        <a href="post-details.php?add=<?php echo $id ?>" class="fw-bold m-0 text-light">
                        উইশলিস্ট
                        </a>
                    </div>
                </div>
            </div>


            

            <hr>
            <div class="img-caro">
                <div class="owl-carousel owl-theme">

                    <?php foreach($imgArray as $img){ ?>
                        <div class="item">
                            <img src="./uploads/<?php echo $img; ?>" alt="">
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

        <div class="basicInfo">
            <div class="title">
                <i class="fa-regular fa-file-lines"></i>
                <p class="fw-bold">জরুরি তথ্য</p>
            </div>

            <hr>

            <div class="info-container">

                <div class="info-txt">
                    <p>বিভাগ</p>
                    <p class="text-center fw-bold">
                        <?php echo $division; ?>
                    </p>
                </div>

                <div class="info-txt">
                    <p>এরিয়া</p>
                    <p class="text-center fw-bold">
                        <?php echo $area; ?>
                    </p>
                </div>

                <div class="info-txt">
                    <p>রিকোয়ারমেন্ট টাইপ</p>
                    <p class="text-center fw-bold">
                        <?php echo $type; ?>
                    </p>
                </div>

                <div class="info-txt">
                    <p>এভেলেবেল ফ্রম</p>
                    <p class="text-center fw-bold">
                        <?php echo $availableDate; ?>
                    </p>
                </div>

                <div class="info-txt">
                    <p>পোস্ট ডেট</p>
                    <p class="text-center fw-bold">
                        <?php echo $post_date; ?>
                    </p>
                </div>
                
            </div>


        </div>

        <?php if($ISLOGIN){ ?>
            <div class="number">
                <div class="title">
                    <i class="fa-regular fa-address-book"></i>
                    <p class="fw-bold">যোগাযোগ</p>
                </div>
                <hr>
                <div class="info-txt phone">
                    <p>ফোন নাম্বার</p>
                    <p class="fw-bold">
                        <?php echo $number; ?>
                    </p>
                </div>
            </div>

        <?php } else{ ?>
            <div class="number">
                <div class="title">
                    <i class="fa-regular fa-address-book"></i>
                    <p class="fw-bold">যোগাযোগ</p>
                </div>
                <hr>
                
                <div class="restic">
                    <i class="fa-solid fa-user-lock"></i>
                    <p class="fw-bold">তথ্যটি দেখতে দয়া করে লগইন করুন।</p>
                </div>

            </div>
        
        <?php } ?>


        <div class="description">
            <div class="title">
                <i class="fa-regular fa-envelope"></i>
                <p class="fw-bold">বিস্তারিত তথ্য</p>
            </div>
            <hr>
            <div>
                <p class="money">
                    <?php echo $description; ?>
                </p>
            </div>


        </div>

        <div class="price">
            <div class="title">
                <i class="fa-regular fa-credit-card"></i>
                <p class="fw-bold">প্রাইস রেঞ্জ</p>
            </div>
            <hr>
            <div class="money">
                <h3 class="fw-bold"><?php echo $price ?> BDT</h3>
            </div>
        </div>







    </div>

    






    <?php myFooter(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay:true,
                // center:true,
                autoplayTimeout: 2000,

                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items: 3
                    }
                },
            });
        });
    </script>

    <script src="./src/js/script.js"></script>
    
    
</body>
</html>