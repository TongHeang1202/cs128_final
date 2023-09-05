<?php

    //define variables and set value empty
    $nameErr = $emailErr = $pwdErr = $pwdcErr = '';

    $error = false;

    // connect to db
    include("layout/connectDB.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $name = $_POST['fullname'];
      $email = $_POST['email'];
      $pwd = $_POST['password'];
      $pwdc = $_POST['pwdc'];

      if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $nameErr = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Please Enter Valid Email ID";
    }
    if(strlen($pwd) < 6) {
        $pwdErr = "Password must be minimum of 6 characters";
    }      
    if($pwd != $pwdc) {
        $pwdcErr = "Password and Confirm Password doesn't match";
    }
    
          // insert into DB
          if(!$error)
          {
            $sql = "INSERT INTO `tbl_user` (user_name, user_email, user_password) VALUES ('$name', '$email', '$pwd')";
            $rs = mysqli_query($connection, $sql);
            if($rs)
            {
              echo "Contact Records Inserted";
            }
          }
         else {
           echo "Error: " . $sql . "" . mysqli_error($connection);
        }
        }
        function validate($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
    return $data;
        }

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap 5 bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- style -->
    <title>login</title>

</head>

<body>

<section class="vh-200 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 bg-dark">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <span class= "text-danger"><?php $error?></span>
              <form method="POST" action="register.php">
  
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg"  name="fullname" class="form-control form-control-lg" />
                  <label class="form-label" name="fullname" for="form3Example1cg" placholder="Name">Your Name</label>
    
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                  <label class="form-label" name="email" for="form3Example3cg" placholder="Email">Your Email</label>
               
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg"  name="password"class="form-control form-control-lg" />
                  <label class="form-label" name="password" for="form3Example4cg" placholder="Password">Password</label>
              
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" name="pwdc" class="form-control form-control-lg" />
                  <label class="form-label" name="pwdc" for="form3Example4cdg" placholder="Repeat your password">Repeat your password</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg bg-primary text-body" name = "register">Confirm</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>