<?php
   require_once 'includes/DB.Config.php';

    if (isset($_GET['email'])) {
        $email = $_GET['email'];

        if (isset($_POST['num_1']) && isset($_POST['num_2']) && $_POST['num_3'] && $_POST['num_4']){

            $num_1 = $_POST['num_1'];
            $num_2 = $_POST['num_2'];
            $num_3 = $_POST['num_3'];
            $num_4 = $_POST['num_4'];

            $otp = $num_1.$num_2.$num_3.$num_4;

            $sql = "SELECT * FROM users WHERE email = '$email'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);

                if ($row['token'] == $otp) {
                    header("Location: confrim-pass.php?email=$email");
                    exit();

                }else{
                    echo "<script type='text/javascript'>alert('আপনার প্রবেশকৃত ওটিপিটি সঠিক নয়।');</script>";
                }
            }
        }

        
    }else{
        header("Location: forget-pass.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পাসওয়ার্ড পুনরুদ্ধার করুন</title>
    <link rel="stylesheet" href="./src/css/reset-pass.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="./src/assets/fonts/AlinurTumatulFont/stylesheet.css">
    <link rel="stylesheet" href="./src/assets/fonts/sirajiFont/stylesheet.css">
</head>
<body>
        <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="overlay"></div>

                <div class="otp">
                    <form method="post">

                        <div class="otp-text mb-3">
                            <p class="fs-5 fw-bold">
                                আপনার ইমেইলে ওটিপিটি চেক করুন 
                            </p>
                        </div>

                        <div class="otp-input">
                            <input type="text" name="num_1" id="num_1" required >
                            <input type="text" name="num_2" id="num_2" required >
                            <input type="text" name="num_3" id="num_3" required >
                            <input type="text" name="num_4" id="num_4" required >
                        </div>

                        <div class="otp-btn mt-5">
                            <input type="submit" name="submit" value="সাবমিট করুন" class="btn btn-success fw-bold">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    


    <script>
        var num_1 = document.getElementById("num_1");
        var num_2 = document.getElementById("num_2");
        var num_3 = document.getElementById("num_3");
        var num_4 = document.getElementById("num_4");

        num_1.addEventListener("keyup", function(){
            if (num_1.value.length == 1) {
                num_2.focus();
            }
        });
        num_2.addEventListener("keyup", function(){
            if (num_2.value.length == 1) {
                num_3.focus();
            }
        });
        num_3.addEventListener("keyup", function(){
            if (num_3.value.length == 1) {
                num_4.focus();
            }
        });
        num_4.addEventListener("keyup", function(){
            if (num_4.value.length == 1) {
                num_4.blur();
            }
        });
        
    </script>
</body>
</html>