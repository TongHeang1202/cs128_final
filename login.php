<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 4 -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- style -->
    <link rel="stylesheet" href="./css/login.css">
    <title>login</title>
</head>

<body>
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Ear Candy</h2>
            <img class="ear-candy-logo" src="images/logo.png">
        </div>
    </div>

    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <form method="POST" action="register.php">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" name= "email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name= "password" placeholder="Password">
                    </div>
                    <a href="index.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Home</a>
                    <button type="submit" class="btn btn-black">Login</button>
                    <a href="register.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true">Register</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>