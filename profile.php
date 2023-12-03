<?php
    require_once "./includes/Footer.php";
    require_once "./includes/Narvbar.php";
    require_once "./includes/DB.Config.php";


    session_start();
    if(!isset($_SESSION['email']) && !isset($_SESSION['name'])){
        header("Location: login.php");
        exit();
    }

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    
    $ISLOGIN = false;
    $img = "dp.jpg";


    if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
        $ISLOGIN = false;
    }else{
        $ISLOGIN = true;
        if ($_SESSION['image'] != "") {
            $img = $_SESSION['image'];
        }
    }

    // Profile picture update

    if(isset($_POST['profile'])){

        $img = $_FILES['profileImg']['name'];
        $img_tmp = $_FILES['profileImg']['tmp_name'];

        if ($img != "") {

            move_uploaded_file($img_tmp, "./uploads/{$img}");

            $sql = "UPDATE users SET image = '$img' WHERE email = '$email'";

            if(mysqli_query($con, $sql)){
                $_SESSION['image'] = $img;
                header("Location: profile.php");
                exit();
            }else{
                echo "
                    <script>
                        alert('আপনার ছবি আপডেট করা যায়নি');
                    </script>
                ";
            }

        }

    }


    // Name update

    if(isset($_POST['nameUpdate'])){

        $name = $_POST['name'];

        $sql = "UPDATE users SET name = '$name' WHERE email = '$email'";

        if(mysqli_query($con, $sql)){
            $_SESSION['name'] = $name;
            header("Location: profile.php");
            exit();
        }else{
            echo "
                <script>
                    alert('আপনার নাম আপডেট করা যায়নি');
                </script>
            ";
        }

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
    <link rel="stylesheet" href="./src/css/profilestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>প্রোফাইল</title>
</head>
<body>
    <div class="container">

        <?php Navbar($ISLOGIN, $_SESSION['image']); ?>

        <h3 class="mar-top mb-5">প্রোফাইল</h3>

        <form method="post"  enctype='multipart/form-data'>
            <img class="dp" required src="./uploads/<?php echo $img; ?>" alt="profile" >
            <p class ="mt-2">ছবি পরিবর্তন করুন</p>
            <input class="form-control imgfile" type="file" name="profileImg" id="profileImg" >
            <input type="submit" name="profile" class="btn btn-success mt-3" value="আপডেট করুন">
        </form>



        <p class="mt-5">ই-মেইল</p>
        <input type="text" class="form-control imgfile" value="<?php echo $email; ?>" disabled>

        
        <form method="post">
            <p class="mt-5">নাম</p>
            <input type="text" class="form-control imgfile" name="name" value="<?php echo $name; ?>" required >
            <input type="submit" name="nameUpdate" class="btn btn-success mt-3" value="পরিবর্তন করুন">
        </form>

        
        <form method="post">
            <p class="mt-5">পাসওয়ার্ড</p>

            <input type="password" class="form-control imgfile" name="password" required placeholder="পুরাতন পাসওয়ার্ড">

            <input type="password" class="form-control mt-2 imgfile" name="newPassword" required placeholder="নতুন পাসওয়ার্ড">

            <input type="submit" name="passwordUpdate" class="btn btn-success mt-3" value="পরিবর্তন করুন">
        </form>

        <div class="post-wrapper">
            <h4 class="mt-5 fw-bold mb-5">আপনার পোস্টসমূহ</h4>
            <div class="container-fluid">

                <div class="row mt-4">
                    <div class="col-lg-3">
                        <div class="card">
                            <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Office Space</h5>
                                <p class="card-text text-dark">Merul Badda, Dhaka</p>
                                <div class="d-flex justify-content-between">

                                    <a href="#" class="details-btn btn-success">বিস্তারিত দেখুন</a>

                                    <a href="#" class="dlt-btn btn-danger">মুছে ফেলুন</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Office Space</h5>
                                <p class="card-text text-dark">Merul Badda, Dhaka</p>
                                <div class="d-flex justify-content-between">

                                    <a href="#" class="details-btn btn-success">বিস্তারিত দেখুন</a>

                                    <a href="#" class="dlt-btn btn-danger">মুছে ফেলুন</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Office Space</h5>
                                <p class="card-text text-dark">Merul Badda, Dhaka</p>
                                <div class="d-flex justify-content-between">

                                    <a href="#" class="details-btn btn-success">বিস্তারিত দেখুন</a>

                                    <a href="#" class="dlt-btn btn-danger">মুছে ফেলুন</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <img draggable='false' src="./src/assets/room.jpg" class="card-img-top" alt="room pictures">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Office Space</h5>
                                <p class="card-text text-dark">Merul Badda, Dhaka</p>
                                <div class="d-flex justify-content-between">

                                    <a href="#" class="details-btn btn-success">বিস্তারিত দেখুন</a>

                                    <a href="#" class="dlt-btn btn-danger">মুছে ফেলুন</a>
                                </div>
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
        </div>

        <?php myFooter(); ?>
        <div class="mt-5"></div>

    </div>

    <script type="text/javascript" src="./src/js/script.js"></script>

</body>
</html>