<?php

  require_once 'includes/DB.Config.php';

  function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }

  if (isset($_POST['email']) && isset($_POST['password'])) {

   if (isValidEmail($_POST['email'])) {
     $email = $_POST['email'];
    }
    else {
      echo "<script type='text/javascript'>alert('আপনার প্রবেশকৃত ইমেইলটি সঠিক নয়।');</script>";
    }

    $password = htmlspecialchars($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($con, $sql);


    if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);

      if (password_verify($password, $row['password'])) {

        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['type'] = $row['type'];

        if ($row['type'] == 'admin') {
          header("Location: admin.php");
        }
        else {
          header("Location: index.php");
        }

      }
      else {
        echo "<script type='text/javascript'>alert('আপনার পাসওয়ার্ডটি সঠিক নয়।');</script>";
      }


    }
    else {
      echo "<script type='text/javascript'>alert('আপনার পাসওয়ার্ডটি সঠিক নয়।');</script>";
    }

  }

?>

<!DOCTYPE html>
<html lang="bn">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="./src/css/signinstyle.css" />
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
      />

      <link rel="stylesheet" href="./src/assets/fonts/AlinurTumatulFont/stylesheet.css">
      <link rel="stylesheet" href="./src/assets/fonts/sirajiFont/stylesheet.css">

      <title> 
        লগইন করুন
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
                <span class="log">স্বাগতম!</span><br> 
                আপনার 'বাসা লাগবে' একাউন্টে লগইন করুন।
              </p>
            </div>

          </div>


          <div class="col-md-6 right">
            <div class="input-box">

            <form method="post" onSubmit="return ">

              <div class="input-field">
                <input
                  type="email"
                  class="input"
                  id="email"
                  name="email"
                  required
                />
                <label for="email">ই-মেইল</label>
              </div>


              <div class="input-field">
                <input type="password" name="password" class="input" id="pass" required />
                <label for="pass">পাসওয়ার্ড</label>
              </div>
     


              <div class="input-field mt-3">
                <input type="submit" class="submit fw-bold" value="লগইন করুন" />
              </div>

            </form>


              <div class="signin">

                <span class="">
                  পাসওয়ার্ড ভুলে গিয়েছেন?<a href="forget-pass.php" class="fw-bold  log">  পুনরুদ্ধার করুন</a>
                </span>


                <p class="fw-bold mt-3">
                  ------ অথবা ------
                </p>

                

                <span class="mt-1">
                  একাউন্ট নেই?<a href="signup.php" class="fw-bold  log">  তৈরি করুন</a>
                </span>

              </div>


            </div>
          </div>


        </div>

      </div>

    </div>
  </body>

  <!-- <script>

    function isValidEmail($email) {
      $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
      return preg_match($pattern, $email) === 1;
    }

    function validateForm() {

      var x = document.getElementById("email").value;
      var y = document.getElementById("pass").value;

      if (x != "") {

        if (isValidEmail(x)) {
          alert("Email is valid");
          return true;
        }

        alert("আপনার প্রবেশকৃত ইমেইলটি সঠিক নয়।");
        return false;

      }
      if (y == "") {
        alert("আপনার পাসওয়ার্ডটি সঠিক নয়।");
        return false;
      }
    }
  </script> -->


</html>
