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
        <h2>Admin Create</h2>
        <form method="post" action="createPage.php">
            <div class="user-values">
                <label>Name:</label>
                <input type="text" name="name" />
            </div>
            <br />
            <div class="user-values">
                <label>Workout1:</label>
                <input type="text" name="workout1" />
            </div>
            <br />
            <div class="user-values">
                <label>Workout2:</label>
                <input type="text" name="workout2" />
            </div>
            <br />
            <div class="user-values">
                <label>Video Link:</label>
                <input type="text" name="videoLink" />
            </div>
            <br />
            <div class="user-values">
                <button type="submit" class="btn" name="create">Create</button>
            </div>
        </form>

    </div>
    <div id="rightSide"></div>
</div>

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/MainPages/Footer.php');
?>
