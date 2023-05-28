<?php
include_once "Header.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/dbConnection/UserConnection.php');
?>


<form method="post" action="Home.php">
    <div class="user-values">
        <button type="submit" class="btn" name="logout">Logout</button>
    </div>
</form>

<?php
include_once "Footer.php"
?>