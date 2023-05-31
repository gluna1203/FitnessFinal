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
                <label>Muscle ID:</label>
                <input type="text" name="muscleId" />
            </div>
            <br />
            <div class="user-values">
                <label for="AreaValues">Choose Muscle Area:</label>
                <select name="AreaValues">
                    <option value="1">Core</option>
                    <option value="2">Pectorals</option>
                    <option value="3">Shoulders</option>
                    <option value="4">Back</option>
                    <option value="5">Legs</option>
                    <option value="6">Arms</option>
                </select>
            </div>
            <br/>
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
                <label>workout2:</label>
                <input type="text" name="workout2" />
            </div>
            <br />
            <div class="user-values">
                <label>Video Link:</label>
                <input type="text" name="videoLink" />
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
include_once "Footer.php";
?>

