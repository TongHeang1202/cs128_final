<?php
include("layout/connectDB.php");
    //define variables and set value empty
    $nameErr = $emailErr = $pwdErr = $pwdcErr = '';
    $error =false;
    // connect to db
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $name = $_POST['fullname'];
      $email = $_POST['email'];
      $pwd = $_POST['password'];
      $pwdc = $_POST['pwdc'];
// validate form fields
    if (empty($name)){
        $error = true;
        $nameErr = 'name is required!';
    }
    else{
        $name = validate($_POST['fullname']);
        }
  
    if (empty($email)){
      $error = true;
        $emailErr = 'email is required!';
    }
    else{
        $email = validate($_POST['email']);
        //check if the email format is correct
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailErr = 'email format is not correct!';
        }
        // check whether email has been used already
    $tbl_user = "SELECT * FROM `tbl_user` WHERE `user_email` = '$email'";
    $q_user = mysqli_query($connection, $tbl_user);
    if (mysqli_num_rows($q_user) > 0){
      $error = true;
      $emailErr = "email already used";
    }
    //checks the length of the password
    }
    if (empty($pwd)){
      $error = true;
        $pwdErr = 'password is required!';
    }else if(strlen($pwd) < 8){
      $error = true;
      $pwdErr = 'password is too short!';
    }
    // checks if passwords are the same
    if (empty($pwdc)){
      $error = true;
        $pwdcErr = 'password is not confirmed!';
    }
    else if ($pwd != $pwdc){
      $error = true;
      $pwdcErr = 'password is not the same';
    }
    // if there isn't an error add user to db
    if(!$error)
    {
      $sql = "INSERT INTO `tbl_user`(user_name, user_email, user_password) VALUES ('$name', '$email', '$pwd')";
      if (mysqli_query($connection, $sql)) {
        echo "New record created successfully";
        header("location: login.php");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
      mysqli_close($connection);
    }
  }
        // validate data
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

              
              <form method="POST" action="register.php">
  
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg"  name="fullname" class="form-control form-control-lg" />
                  <label class="form-label" name="fullname" for="form3Example1cg" placholder="Name">Your Name</label>
                  <span class = "text-danger"><?php echo "*".$nameErr;?></span>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                  <label class="form-label" name="email" for="form3Example3cg" placholder="Email">Your Email</label>
                  <span class= "text-danger"><?php echo"*". $emailErr?></span>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg"  name="password"class="form-control form-control-lg" />
                  <label class="form-label" name="password" for="form3Example4cg" placholder="Password">Password</label>
                  <span class= "text-danger"><?php echo "*".$pwdErr?></span>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" name="pwdc" class="form-control form-control-lg" />
                  <label class="form-label" name="pwdc" for="form3Example4cdg" placholder="Repeat your password">Repeat your password</label>
                  <span class= "text-danger"><?php echo "*".$pwdcErr?></span>
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