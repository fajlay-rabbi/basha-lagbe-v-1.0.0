<?php
    require_once "./includes/Narvbar.php";
    require_once "./includes/Footer.php";
    require_once "./includes/DB.Config.php";

    session_start();

    if(!isset($_SESSION['email']) && !isset($_SESSION['name'])){
        header("Location: signin.php");
        exit();
    }

    $ISLOGIN = false;
    $img = '';

    if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
        $ISLOGIN = false;
    }else{
        $ISLOGIN = true;
        if ($_SESSION['image'] != "") {
            $img = $_SESSION['image'];
        }
    }

    $id = $_SESSION['id'];
    $posts = array();

 

    $sql = "SELECT post.*\n"
        . "FROM wishlist\n"
        . "JOIN post ON wishlist.post_id = post.id\n"
        . "WHERE wishlist.user_id = $id;";


    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }


    // Delete post from wishlist
    if(isset($_GET['dlt'])){   
        $dlt_id = $_GET['dlt'];

        $sql = "DELETE FROM wishlist WHERE post_id = $dlt_id AND user_id = $id;";
        mysqli_query($con, $sql);
        header("Location: wishlist.php");
        exit();
    }

?>



<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>উইশলিস্ট</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/wishliststyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./src/assets/fonts/AlinurTumatulFont/stylesheet.css">
    <link rel="stylesheet" href="./src/assets/fonts/sirajiFont/stylesheet.css">
</head>
<body>

    <div class="container">
        <?php
            Navbar($ISLOGIN, $img);
        ?>

        <div class="wrapper">
            <h3 class="mb-1">উইশলিস্ট</h3>
            <hr>

            <?php if($posts == null){ ?>
                <h3 class='text-center text-light mt-5'>আপনার উইশলিস্টে কোনো পোস্ট নেই।</h3>
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

                           echo "<a href='wishlist.php?dlt=$post_id' class='dlt-btn btn-danger'>মুছে ফেলুন</a>";
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


        <?php
            myFooter();
        ?>
    </div>
    
    <script src="./src/js/script.js"></script>
</body>
</html>