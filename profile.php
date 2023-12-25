<?php
    require_once "./includes/Footer.php";
    require_once "./includes/Narvbar.php";
    require_once "./includes/DB.Config.php";


    session_start();
    if(!isset($_SESSION['email']) && !isset($_SESSION['name'])){
        header("Location: login.php");
        exit();
    }

    $id = $_SESSION['id'];
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


    // fetch the user posts

    $sql = "SELECT * FROM post WHERE user_id = '$id'";
    $result = mysqli_query($con, $sql);
    $posts = array();

    while ($row = mysqli_fetch_assoc($result)) {
            $posts[] = $row; 
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

    //password update
    if (isset($_POST['passwordUpdate'])) {
            
            $password = $_POST['password'];
            $newPassword = $_POST['newPassword'];
    
            $sql = "SELECT * FROM users WHERE email = '$email'";
    
            $result = mysqli_query($con, $sql);
    
            if (mysqli_num_rows($result) > 0) {
    
                $row = mysqli_fetch_assoc($result);
    
                if (password_verify($password, $row['password'])) {
    
                    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
                    $sql = "UPDATE users SET password = '$newPassword' WHERE email = '$email'";
    
                    if(mysqli_query($con, $sql)){
                        header("Location: profile.php");
                        exit();
                    }else{
                        echo "
                            <script>
                                alert('আপনার পাসওয়ার্ড আপডেট করা যায়নি');
                            </script>
                        ";
                    }
    
                }else{
                    echo "
                        <script>
                            alert('আপনার পুরাতন পাসওয়ার্ডটি ভুল');
                        </script>
                    ";
                }
    
            }

    }

    //delete the post
    if (isset($_GET['dlt'])) {
        
        $post_id = $_GET['dlt'];

        $sql = "DELETE FROM post WHERE id = '$post_id' AND user_id = '$id'";

        if(mysqli_query($con, $sql)){
            header("Location: profile.php");
            exit();
        }else{
            echo "
                <script>
                    alert('আপনার পোস্টটি মুছে ফেলা যায়নি');
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

        <h3 class="mar-top mb-1">প্রোফাইল</h3>

        <hr>

        <div class="mb-5"></div>

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

            <?php if($posts == null){ ?>
                <h3 class='text-center text-light mt-5'>আপনার কোনো পোস্ট নেই।</h3>
            <?php } else {?>

            <div class="container-fluid">

                <div class="row mt-4">

                    <?php
                        foreach($posts as $post){

                            $type = ucwords($post['type']);
                            $type = $type.' '."Space";

                            $area = ucwords($post['area']);
                            $division = ucwords($post['division']);
                            $place = $area.', '.$division;
                            $post_id = $post['id'];

                            $imgArray = explode(', ', $post['image']);
                            $img = $imgArray[0];

                           echo "<div class='col-lg-3 mt-4'>";
                           echo "<div class='card'>";
                           echo "<img draggable='false' src='./uploads/{$img}' class='card-img-top mycard-img' alt='room pictures'>";
                           echo "<div class='card-body'>";
                           echo "<h5 class='card-title text-dark'>{$type}</h5>";
                           echo "<p class='card-text text-dark'>{$place}</p>";
                           echo "<div class='d-flex justify-content-between'>";

                           echo "<a href='post-details.php?id=$post_id' class='details-btn btn-success'>বিস্তারিত দেখুন</a>";

                           echo "<a href='profile.php?dlt=$post_id' class='dlt-btn btn-danger'>মুছে ফেলুন</a>";
                           echo "</div>";
                           echo "</div>";
                           echo "</div>";
                           echo "</div>";

                            
                        }
                    ?>

                    

                </div>

            </div>

            <?php } ?>

        </div>

        <?php myFooter(); ?>
        <div class="mt-5"></div>

    </div>

    <script type="text/javascript" src="./src/js/script.js"></script>

</body>
</html>