<?php
include_once "Header.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/dbConnection/UserConnection.php');

?>


    <div id="divider">
        <div id="leftSide"></div>
        <div id="centerSide">

            <div class="header">
                <h2>Register</h2>
            </div>
            
            <form method="post" action="RegisterPage.php">
                <div class="user-values">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" />
                </div>
                <div class="user-values">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" />
                </div>
                <div class="user-values">
                    <label>Password</label>
                    <input type="password" name="password" />
                </div>
                <div class="user-values">
                    <button type="submit" class="btn" name="register">Register</button>
                </div>
                <p>
                    Have an account? <a href="loginPage.php">Sign in</a>
                </p>
            </form>
</div>
        <div id="rightSide"></div>
    </div>

   


<?php
include_once "Footer.php";
?>