<?php
    require 'vendor/autoload.php';
    require_once 'includes/DB.Config.php';

    if (isset($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

            $randomNumber = rand(1000, 9999);

            $mail = new PHPMailer\PHPMailer\PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sheikhfajlayrabbi@gmail.com';
            $mail->Password = 'your app password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;


            $mail->setFrom('sheikhfajlayrabbi@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Basha-Lagbe";
            $mail->Body = "
            <html>
                <body>
                    <p>আপনার পাসওয়ার্ড পুনরুদ্ধার করতে নিচের কোডটি ব্যবহার করুন।</p>
                    <h2>$randomNumber</h2>
                </body>
            </html>";

            if ($mail->send()) {

                $sql = "UPDATE users SET token='$randomNumber' WHERE email='$email'";
                $result = mysqli_query($con, $sql);

                if ($result) {
                    header("Location: reset-pass.php?email=$email");
                    exit();
                }
                
            }else{
                echo "<script type='text/javascript'>alert('আপনার ওটিপিটি ইমেইলে পাঠানো হয়নি।');</script>";
            }


        } else {
            echo "<script type='text/javascript'>alert('আপনার প্রবেশকৃত ইমেইলটি খুঁজে পাওয়া যায় নী');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পাসওয়ার্ড পুনরুদ্ধার করুন</title>

    <link rel="stylesheet" href="./src/css/forgetpassstyle.css" />
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
                <form method="post" onsubmit="return validateForm()">
                    <p class="text-center mb-5 fw-bold">পাসওয়ার্ড পুনরুদ্ধার করতে আপনার ইমেইলটি প্রবেশ করুন।</p>
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" aria-label="email" aria-describedby="basic-addon1">
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success p-2 fw-bold ">পাসওয়ার্ড পুনরুদ্ধার করুন</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    


    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            if (email == "") {
                alert("আপনার ইমেইলটি প্রবেশ করুন");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>