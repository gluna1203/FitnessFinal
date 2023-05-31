<?php
include_once "Header.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/dbConnection/UserConnection.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/dbConnection/crud.php');
include_once($_SERVER['DOCUMENT_ROOT']."/Utility.php");

// if (!logged()) {
//     header('location: /Pages/LoginPage.php');
// }

$workoutList = displayText();
?>

<h2>Workout List</h2>
<ul id="muscleList">
    <?php foreach ($workoutList as $muscle) : ?>
    <li>
        Muscle ID: <?= $muscle['muscleId'] ?>, Name: <?= $muscle['name'] ?>, Workout1: <?= $muscle['workout1'] ?>, Workout2: <?= $muscle['workout2'] ?>
    </li>
    <?php endforeach; ?>
</ul>

<?php
include_once "Footer.php";
?>

