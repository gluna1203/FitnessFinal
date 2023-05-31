<?php
include_once "Header.php";
include_once($_SERVER['DOCUMENT_ROOT']."/dbConnection/UserConnection.php");
include_once($_SERVER['DOCUMENT_ROOT']."/dbConnection/MuscleConnection.php");

if (!isAdmin()) {
	header('location: /Pages/LoginPage.php');
}

?>
<div id="divider">
    <div id="leftSide"></div>
    <div id="centerSide">
        <h2>Admin Delete</h2>
        <form method="post" action="/Pages/deletePage.php">
            <div class="user-values">
                <label>Muscle ID:</label>
                <input type="text" name="muscleId" />
            </div>
            <br />
            <div class="user-values">
                <button type="submit" class="btn" name="delete">Delete</button>
            </div>

</div>
    <div id="rightSide"></div>
</div>

</form>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/MainPages/Footer.php');
?>
