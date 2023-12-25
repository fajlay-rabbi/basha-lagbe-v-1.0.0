<?php

    require_once "./includes/Narvbar.php";
    require_once "./includes/Footer.php";
    require_once "./includes/DB.Config.php";

    session_start();

    if(!isset($_SESSION['name'])){
        header("Location: signin.php");
        exit();
    }

    $ISLOGIN = true;
    $img = $_SESSION['image'];
    $user_id = $_SESSION['id'];
    

    if (isset($_POST['submit'])) {

        $division = $_POST['distic'];
        $type = $_POST['type'];
        $area = $_POST['area'];
        $avail = $_POST['avail'];
        $price = $_POST['price'];
        $contact = $_POST['contact'];
        $description = $_POST['description'];

        $formattedDate = date("d M Y", strtotime($avail));
        $todayDate = date("d M Y");


        $ar = [];


        // $image = $_FILES['image']['name'];
        // $image_tmp = $_FILES['image']['tmp_name'];


        $uploadedFiles = $_FILES["image"];

        foreach ($uploadedFiles["tmp_name"] as $key => $tmpName) {

            $fileName = basename($uploadedFiles["name"][$key]);
            // $targetPath = $targetDirectory . $fileName;

            array_push($ar, $fileName);

            if (move_uploaded_file($tmpName, "./uploads/{$fileName}")) {
                // echo "<script>alert('পোস্ট করা হয়েছে')</script>";
            } else {
                echo "<script>alert('পোস্ট করা হয়নি')</script>";
            }
        }


        $str = implode(', ', $ar); 


        // $sql = "INSERT INTO `post` (`id`, `division`, `area`, `type`, `availableDate`, `price`, `number`, `description`, `image`, `post_date`, `user_Id`) VALUES (NULL, '$division', '$area', '$type', '$formattedDate', '$price', '$contact', '$description', '$str', $todayDate, $user_id);";

        $sql = "INSERT INTO `post` (`id`, `division`, `area`, `type`, `availableDate`, `price`, `number`, `description`, `image`, `post_date`, `user_Id`) VALUES (NULL, '$division', '$area', '$type', '$formattedDate', '$price', '$contact', '$description', '$str', '$todayDate', '$user_id');";


        $result = mysqli_query($con, $sql);

        if ($result) {
            header("Location: index.php");
            exit();        
        } else {
            echo "<script>alert('পোস্ট করা হয়নি')</script>";
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
    <link rel="stylesheet" href="./src/css/poststyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>পোস্ট করুন</title>
</head>
<body>
    <div class="container">
        <?php Navbar($ISLOGIN, $img) ?>

        <div class="wrapper p-3">
            <p class="fs-5 mb-5 fw-bold">পোস্ট করুন</p>

            <hr>
            
            <div class="mt-4"></div>

            <form action="post.php" method="POST" enctype="multipart/form-data">

                <div class="mb-4 in-width">
                     <label for="distic" class="text-light">বিভাগ</label> <br />
                        <select name="distic" id="distic" class="form-control">
                            <option selected value="dhaka">ঢাকা</option>
                            <option value="chottogram">চট্টগ্রাম</option>
                            <option value="khulna">খুলনা</option>
                            <option value="rajshahi">রাজশাহী</option>
                            <option value="sylhet">সিলেট</option>
                            <option value="barisal">বরিশাল</option>
                            <option value="rangpur">রংপুর</option>
                            <option value="mymensingh">ময়মনসিংহ</option>
                        </select>
                </div>

                <div class="mb-4 in-width">
                     <label for="type" class="text-light">রিকোয়ারমেন্ট  টাইপ</label> <br />
                     <select name="type" id="type" class="form-control">
                        <option value="family">ফ্যামিলি বাসা</option>
                        <option selected value="office">অফিস স্পেস</option>
                        <option value="men">ব্যাচেলর - পুরুষ</option>
                        <option value="women">ব্যাচেলর - নারী</option>
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
                    <input type="file" class="form-control" id="image" name="image[]" multiple >
                </div>




                <button type="submit" class="btn btn-success" name="submit">পোস্ট করুন</button>


            </form>




        </div>
    </div>






    <?php myFooter(); ?>
    <script type="text/javascript" src="./src/js/script.js"></script>
</body>
</html>