<?php
// set to null
$nameError = "";
$emailError = "";
$passwordError = "";
$passwordRepeatError = "";

$name = $email= $password = $passwordRepeat = "";

// submit 
  if(isset($_POST["submit"]))
  {
    // check name
    if(empty($_POST["name"]))
    {
      $nameError = "Name is Requred";
    }
    else
    {
      $name = input($_POST["name"]);
    }

    // check email 
    if (empty($_POST["email"])) {		
      $emailError = "Email is required";		
    } 
    else {
      $email = input($_POST["email"]);		
 
         // check that the e-mail address is well-formed		
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
           $emailError = "Invalid email format";		
       }	
    }
    // check password
    if(strlen($password)<8)
    {
      $passwordError = "Password must be at least 8 characters long";
    }
    else{
      $password = $_POST['password'];
    }
    // check repeat password
    if($password!==$passwordRepeat)
    {
      $passwordError = "Password does not match";
    }
  }
  function input($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
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

    <style>
      .error {
        color: red;
      }
    </style>
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
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" name="fullname" for="form3Example1cg">Your Name</label>
                  <div class="error"><?php echo $nameError;?></div>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" name="email" for="form3Example3cg">Your Email</label>
                  <span class = "error">*<?php echo $emailError;?></span>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" name="password" for="form3Example4cg">Password</label>
                  <span class = "error">* <?php echo $passwordError;?></span>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" name="repeat_password" for="form3Example4cdg">Repeat your password</label>
                  <span class = "error">* <?php echo $passwordRepeatError;?></span>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg bg-primary text-body">Confirm</button>
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