<script>
    //script for profile button (login, account, register)
    buttonClose = true;
    function open_logout(){
        if (buttonClose){
            document.getElementById("logout-button").style.display = "flex";
            document.getElementById("logout-button").style.justifyContent = "center";
            document.getElementById("logout-button").style.alignItems = "center";
            buttonClose = false;
        }
        else {
            document.getElementById("logout-button").style.display = "none";
            buttonClose = true;
        }
    }
</script>
<!-- nav for when there is a user -->
<div class="topnav"> 
        <div class="topnav-left">
            <a href="./">
                <img class="logo" src="images/logo.png">
                EAR CANDY
            </a>
        </div>

        <div class="topnav-mid">
            <a id="home "href="index.php">Home</a>
            <a id="piano" href="menu.php?category=piano">Piano</a>
            <a id="guitar" href="menu.php?category=guitar">Guitar</a>
            <a id="violin" href="menu.php?category=violin">Violin</a>
            <a id="about" href="about.php">About</a>
            <a id="support" href="support.php">Support</a>
        </div>

        <div class="topnav-right">
            <!-- start php -->
            <?php 
            //if the user is not logged in
            if (!isset($_SESSION["user_id"])){
            ?>
                <a id="sign-in" href="login.php">Sign In</a>
                <a id="register" href="register.php">Register</a>
            <?php 
            }
            else {
                //if there is a logged in user
                ?>
                <a id="shopping-cart" href="cart-page.php"><img src="images/shopping-cart.png"></a>
                <a id="account-icon" onclick="open_logout()">
                    <img src="images/profile-user.png">
                    <form action="layout/logout.php" method="POST"><button id="logout-button"><span>Logout</span></button></form>
                </a>
                <?php 
            }
            ?>
            <!-- end php -->
        </div>
    </div>