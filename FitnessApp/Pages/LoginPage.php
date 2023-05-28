<?php
include_once "Header.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/dbConnection/UserConnection.php');
?>




    <div id="divider">
        <div id="leftSide"></div>
        <div id="centerSide">

            <div class="header">
                <h2>Login</h2>
            </div>
            
            <form method="post" action="LoginPage.php">
                <div class="user-values">
                    <label>Username</label>
                    <input type="text" name="username" />
                </div>
                <div class="user-values">
                    <label>Password</label>
                    <input type="password" name="password" />
                </div>
                <div class="user-values">
                    <button type="submit" class="btn" name="login">Login</button>
                </div>
                <p>
                    Don't have account? <a href="RegisterPage.php">Sign up</a>
                </p>
            </form>
</div>
        <div id="rightSide"></div>
    </div>



<?php
include_once "Footer.php";
?>