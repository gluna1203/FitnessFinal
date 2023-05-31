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
        <h2>Admin Edit</h2>
        <form method="post" action="editPage.php">
            <div class="user-values">
                <label>ID:</label>
                <input type="text" name="conId" />
            </div>
            <br />
            <div class="user-values">
                <label>Name:</label>
                <input type="text" name="name" />
            </div>
            <br />
            <div class="user-values">
                <label>Manufacturer:</label>
                <input type="text" name="manufacturer" />
            </div>
            <br />
            <div class="user-values">
                <label>Units Sold:</label>
                <input type="text" name="unitsSold" />
            </div>
            <br />
            <div class="user-values">
                <label>Release Year:</label>
                <input type="text" name="releaseYear" />
            </div>
            <br />
            <div class="user-values">
                <button type="submit" class="btn" name="update">Update</button>
            </div>
        </form>
    </div>
    <div id="rightSide"></div>
</div>



<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/MainPages/Footer.php');
?>

