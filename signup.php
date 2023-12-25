<?php

  require_once "./includes/DB.Config.php";

  function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }

  if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
   
    if (isValidEmail($_POST['email'])) {

      $name = htmlspecialchars($_POST['name']);
      $email = $_POST['email'];
      $password = htmlspecialchars($_POST['password']);

      $sql = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) > 0) {
        echo "<script type='text/javascript'>alert('আপনার প্রবেশকৃত ইমেইলটি পূর্বে ব্যবহার করা হয়েছে।');</script>";
      }else{

        $password = password_hash($password, PASSWORD_DEFAULT);
   
        $sql = "INSERT INTO users (name, email, password, image, token, type) VALUES ('$name', '$email', '$password', '','', 'user')";

       
        if (mysqli_query($con, $sql)) {
          
          echo "<script type='text/javascript'>alert('আপনার অ্যাকাউন্টটি সফলভাবে তৈরি হয়েছে।');</script>";

          header("Location: signin.php");
          exit();
        }
    
      else {
          echo "<script type='text/javascript'>alert('আপনার অ্যাকাউন্টটি তৈরি হয়নি। আবার চেষ্টা করুন।');</script>";
        }}
      
    }else {
      echo "<script type='text/javascript'>alert('আপনার প্রবেশকৃত ইমেইলটি সঠিক নয়।');</script>";
    }
    
  }

  
?>

<!DOCTYPE html>
<html lang="bn">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="./src/css/signupstyle.css" />
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />
      <link rel="stylesheet" href="./src/assets/fonts/AlinurTumatulFont/stylesheet.css">
      <link rel="stylesheet" href="./src/assets/fonts/sirajiFont/stylesheet.css">

      <title> 
        রেজিস্টার করুন
      </title>
    </head>
    
  <body>
     <div class="wrapper"> 
      <div class="container main">
        <div class="row">

          <div class="col-md-6 p-0 side-image">

            <div class="overlay"></div>

            <div class="text">
              <p class="fs-5 fw-bold text-start">
                আজই অ্যাকাউন্ট তৈরি করুন এবং আপনার কাঙ্ক্ষিত বাসা খুঁজে বের করুন
              </p>
            </div>

          </div>


          <div class="col-md-6 right">
            <div class="input-box">

            <form method="post" onsubmit="return validatePassword()">

              <div class="input-field">
                <input
                  type="text"
                  class="input"
                  id="email"
                  required
                  autocomplete="off"
                  name="name"
                />
                <label for="name">পূর্ণ নাম</label>
              </div>


              <div class="input-field">
                <input
                  type="email"
                  class="input"
                  id="name"
                  required
                  name="email"
                />
                <label for="email">ই-মেইল</label>
              </div>


              <div class="input-field">
                <input type="password" class="input" id="pass" required name="password" />
                <label for="pass">পাসওয়ার্ড</label>
              </div>


              <div class="input-field">
                <input type="password" class="input" id="cpass" required="" />
                <label for="cpass">কনফার্ম পাসওয়ার্ড</label>
              </div>

              


              <div class="input-field mt-3">
                <input type="submit" class="submit fw-bold" value="রেজিস্ট্রার করুন" />
              </div>
            
            </form>


              <div class="signin">

                <span class="">
                  একাউন্ট আছে?  <a href="signin.php" class="fw-bold  log">লগ ইন</a>
                </span>

              </div>


            </div>
          </div>


        </div>

      </div>

    </div>
  </body>


  <script>

    const pass = document.getElementById("pass");
    const cpass = document.getElementById("cpass");

    function validatePassword() {
      if (pass.value != cpass.value) {
        cpass.setCustomValidity("পাসওয়ার্ডগুলি মিলছে না");
        return false;
      } else {
        cpass.setCustomValidity("");
        return true;
      }
    }

    pass.onchange = validatePassword;
    cpass.onkeyup = validatePassword;

  </script>







</html>
