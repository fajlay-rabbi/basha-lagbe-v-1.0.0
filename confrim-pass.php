<?php
    require_once 'includes/DB.Config.php';

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }

    if (isset($_POST['password']) && isset($_POST['confirm_password'])) {

        
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password == $confirm_password) {

            // hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET password='$password' WHERE email='$email'";

            $result = mysqli_query($con, $sql);

            if ($result) {

                header("Location: signin.php");
                exit();
                
            } else {
                echo "<script>alert('পাসওয়ার্ড পরিবর্তন সফল হয়নি')</script>";
            }
        } else {
            echo "<script>alert('পাসওয়ার্ড মিলছে না')</script>";
        }
    }


?>



<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পাসওয়ার্ড পরিবর্তন করুন</title>
    <link rel="stylesheet" href="./src/css/confrim-pass.css" />
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
                <form method="post" onsubmit="return validatePassword()">
                    <p class="text-center mb-5 fw-bold">পাসওয়ার্ড পরিবর্তনের ক্ষেত্রে একটি শক্তিশালী পাসওয়ার্ড নির্বাচন করুন</p>

              
                    <input type="password" name="password" id="password" class="form-control mb-3" placeholder="পাসওয়ার্ড" aria-label="password" aria-describedby="basic-addon1" required>

        
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="কনফার্ম পাসওয়ার্ড" aria-label="confirm_password" aria-describedby="basic-addon1"  required>

                    <div class="otp-btn mt-5">
                        <button type="submit" class="btn btn-success fw-bold ">পাসওয়ার্ড পরিবর্তন করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        const password = document.getElementById("password");
        const confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("পাসওয়ার্ড মিলছে না");
            } else {
                confirm_password.setCustomValidity("");
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    
</body>
</html>