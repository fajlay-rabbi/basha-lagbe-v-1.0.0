<?php
    $ISLOGIN = false;
    $img = "dp.jpg";

    session_start();
    if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
        $ISLOGIN = false;
    }else{
        $ISLOGIN = true;
        if ($_SESSION['image'] != "") {
            $img = $_SESSION['image'];
        }
    }

    // $con = mysqli_connect('localhost','root','');
    // mysqli_select_db($con,'userregistration');
    // $s = "select * from usertable where username = '$_SESSION[username]'";
    // $result = mysqli_query($con, $s);
    // $num = mysqli_num_rows($result);
    // $row = mysqli_fetch_array($result);
    // $name = $row['name'];
    // $email = $row['email'];
    // $phone = $row['phone'];
    // $username = $row['username'];
    // $password = $row['password'];
    // $id = $row['id'];
    // $image = $row['image'];
    // $image_src = "upload/".$image;


    require_once "./includes/Narvbar.php";
    require_once "./includes/Footer.php";



?>


<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Basha Lagbe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="./src/assets/fonts/AlinurTumatulFont/stylesheet.css">
    <link rel="stylesheet" href="./src/assets/fonts/sirajiFont/stylesheet.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <header>
        <div class="container-fluid hero-wrapper">

          <!-- <nav>
            <div class="container nav-wrapper">

                <div class="logo">
                    <a href="./index.php">বাসা লাগবে</a>
                </div>

                <div class="menu">
                    <ul>
                        <li><a href="./index.php">হোম</a></li>
                        <li><a href="./about.php">আমাদের সম্পর্কে</a></li>
                        <li><a href="./contact.php">যোগাযোগ</a></li>
                        <li><a href="./post.php" class="post">
                            <i class="fa-solid fa-plus"></i>
                            পোস্ট করুন
                        </a></li>
                    </ul>
                </div>


                <div class="avatar" id="avatar-container">
                        <img src="./src/assets/avatar.jpg" alt="avatar" class="img-fluid">

                        <div class="avatar-dropdown" id="avatar-dropdown">
                            <ul>
                                <li>
                                    <a href="profile.php">
                                        <i class="fa-solid fa-user"></i>
                                        প্রোফাইল
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        লগআউট
                                    </a>
                                </li>
                            </ul>
                        </div>
                </div>

            </div>
        </nav> -->

        <?php Navbar($ISLOGIN, $img); ?>

        
            <video autoplay loop muted class="bg-video">
                <source src="./src/assets/v1.mp4" type="video/mp4">
            </video>


            <div class="container hero-content-wrapper">
                <div class="hero-content">
                    <h1 class="animate__animated animate__fadeInLeft">বাসা খোঁজা এখন আরো সহজ,<br /> <span>'বাসা লাগবে'</span> এর সাথে !</h1>

                    <p class="animate__animated animate__fadeInLeft">
                        সহজ এবং দ্রুত সময়ে আমরাই দিচ্ছি আপনার স্বপ্নের আবাসিক সমাধান! আমাদের ওয়েবসাইটে আসুন, আপনার পছন্দের অঞ্চলে বাসা খুঁজুন! যেকোনো স্থানে, যেকোনো সময়ে, সহজেই বাসা খুঁজুন এবং ভাড়া দিন - সবই এখন আপনার হাতের মুঠোয় !
                    </p>

                    <button class="btn rounded-pill mybtn animate__animated animate__fadeInLeft">
                       <a href="#togo" class="findo"> বাসা  খুঁজুন </a>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <form class="myform" id="togo">
                <h1 class="text-light">অনুসন্ধান করুন</h1>

                <div class="form-content">

                    <div class="box">
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


                    <div class="box">
                        <label for="area" class="text-light">এরিয়া</label> <br />
                        <input type="text" name="area" id="area" class="form-control" placeholder="রামপুরা">
                    </div>




                    <div class="box">
                        <label for="type" class="text-light">রিকোয়ারমেন্ট  টাইপ</label> <br />
                        <select name="type" id="type" class="form-control">
                            <option value="বাসা">বাসা</option>
                            <option value="অফিস">অফিস স্পেস</option>
                            <option value="ব্যাচেলর - পুরুষ">ব্যাচেলর - পুরুষ</option>
                            <option value="ব্যাচেলর - নারী">ব্যাচেলর - নারী</option>
                        </select>
                    </div>

                    <input type="submit" class="search-btn" value="সার্চ করুন" >

                </div>

                
            </form>
        </div>



        <div class="container mt-5">

            <div class="row mt-4">

                <div class="col-lg-3">
                    <div class="card">
                        <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                        <div class="card-body">
                            <h5 class="card-title">Office Space</h5>
                            <p class="card-text">Merul Badda, Dhaka</p>
                            <a href="#" class="details-btn">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                        <div class="card-body">
                            <h5 class="card-title">Office Space</h5>
                            <p class="card-text">Merul Badda, Dhaka</p>
                            <a href="#" class="details-btn">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                        <div class="card-body">
                            <h5 class="card-title">Office Space</h5>
                            <p class="card-text">Merul Badda, Dhaka</p>
                            <a href="#" class="details-btn">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                        <div class="card-body">
                            <h5 class="card-title">Office Space</h5>
                            <p class="card-text">Merul Badda, Dhaka</p>
                            <a href="#" class="details-btn">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row mt-4">

                <div class="col-lg-3">
                    <div class="card">
                        <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                        <div class="card-body">
                            <h5 class="card-title">Office Space</h5>
                            <p class="card-text">Merul Badda, Dhaka</p>
                            <a href="#" class="details-btn">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                        <div class="card-body">
                            <h5 class="card-title">Office Space</h5>
                            <p class="card-text">Merul Badda, Dhaka</p>
                            <a href="#" class="details-btn">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                        <div class="card-body">
                            <h5 class="card-title">Office Space</h5>
                            <p class="card-text">Merul Badda, Dhaka</p>
                            <a href="#" class="details-btn">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                        <div class="card-body">
                            <h5 class="card-title">Office Space</h5>
                            <p class="card-text">Merul Badda, Dhaka</p>
                            <a href="#" class="details-btn">বিস্তারিত দেখুন</a>
                        </div>
                    </div>
                </div>


            </div>

        </div>


        <div class="container mt-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
            </nav>
        </div>





    </main>

    <!-- <footer>
        <div class="container mt-5 bg-secondary p-4 rounded-1">
            <div class="row">


                <div class="col-lg-4">
                    <div class="footer-logo logo mb-3">
                        <a href="./index.php">বাসা লাগবে</a>
                    </div>

                    <div class="footer-social-links soc-link">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="footer-links">
                        <ul>
                            <li><a class="text-light fw-bold" href="./index.php">হোম</a></li>
                            <li><a class="text-light fw-bold" href="./about.php">আমাদের সম্পর্কে</a></li>
                            <li><a class="text-light fw-bold" href="./contact.php">যোগাযোগ</a></li>
                            <li><a class="text-light fw-bold" href="./post.php">পোস্ট করুন</a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="footer-address">
                        <ul>
                            <li class="text-light"><i class="fa-solid fa-map-marker"></i> ঢাকা, বাংলাদেশ</li>
                            <li class="text-light"><i class="fa-solid fa-envelope"></i>
                                <a class="text-light" href="mailto: sheikhshovono6@gmail.com"> contact@BashaLagbe.com</a> </li>
                            <li class="text-light"><i class="fa-solid fa-phone"></i> +880 1234567890</li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </footer> -->

    <?php myFooter(); ?>

    <div class="m-1"></div>



    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="./src/js/script.js"></script>

</body>
</html>