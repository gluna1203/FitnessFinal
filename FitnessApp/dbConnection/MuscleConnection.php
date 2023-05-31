<?php
// dbConnection/MuscleConnection.php

define("DB_USER", "root");
define("DB_PSWD", "Neumont#23"); // Add password
define("DB_SERVER", "localhost"); // Value might change depending on the MySQL installation
define("DB_NAME", "muscledb"); // Might be different on your PC

function ConnGetB() {
    $dbConn = mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME)
        or die("Failed to connect to the database: " . mysqli_connect_error());
    return $dbConn;
}

// Assuming you have established a database connection
$connection = ConnGetB();

// Function to display muscles for a specific areaId
function displayMusclesForArea($areaId, $connection) {
    // Fetch muscles for the given areaId from the database
    $query = "SELECT * FROM muscledb.muscles WHERE areaId = $areaId";
    $result = mysqli_query($connection, $query);

    // Store the muscle information in an array
    $muscles = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $muscleId = $row['muscleId'];
        $name = $row['name'];
        $workout1 = $row['workout1'];
        $workout2 = $row['workout2'];
        $videoLink = $row['videoLink'];

        $muscles[] = array(
            'muscleId' => $muscleId,
            'name' => $name,
            'workout1' => $workout1,
            'workout2' => $workout2,
            'videoLink' => $videoLink
        );
    }

    return $muscles;
}

function displayAreaForMuscles($areaId, $connection) {
    // Fetch muscles for the given areaId from the database
    $query = "SELECT * FROM muscledb.bodyarea WHERE areaId = $areaId";
    $result = mysqli_query($connection, $query);

    // Store the muscle information in an array
    $muscles = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $muscleId = $row['areaId'];
        $name = $row['name'];


        $muscles[] = array(
            'muscleId' => $muscleId,
            'name' => $name
        );
    }

    return $muscles;
}

// Check if a button was clicked
if (isset($_POST['areaId'])) {
    $areaId = $_POST['areaId'];

    // Perform CRUD operations based on the areaId
    $muscles = displayMusclesForArea($areaId, $connection);

    // Close the database connection
    mysqli_close($connection);

    // Convert the muscle information to JSON
    $musclesJson = json_encode($muscles);

    // Return the JSON response
    header('Content-Type: application/json');
    echo $musclesJson;

    // Exit the script
    exit;
}

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $workout1 = $_POST['workout1'];
    $workout2 = $_POST['workout2'];
    $videoLink = $_POST['videoLink'];
    echo "<script>alert('name: $name, workout1: $workout1, workout2: $workout2, videoLink: $videoLink');</script>";
    createMuscle($name,$workout1,$workout2,$videoLink,$connection);
}

if (isset($_POST['update'])) {
    $muscleId = $_POST['muscleId'];
    $name = $_POST['name'];
    $workout1 = $_POST['workout1'];
    $workout2 = $_POST['workout2'];
    $videoLink = $_POST['videoLink'];

    echo "<script>alert('muscleId: $muscleId, name: $name, workout1: $workout1, workout2: $workout2, videoLink: $videoLink');</script>";
    updateMuscle($muscleId,$name,$workout1,$workout2,$videoLink,$connection);
}

if (isset($_POST['delete'])) {
    $val = $_POST['muscleId'];
    deleteMuscle($val, $connection);
}

 // Function to create a new muscle
function createMuscle($name, $workout1, $workout2, $videoLink, $connection) {
    $query = "INSERT INTO muscledb.muscles (name, workout1, workout2, videoLink) VALUES ('$name', '$workout1', '$workout2', '$videoLink')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        return mysqli_insert_id($connection); // Return the newly created muscleId
    } else {
        return false; // Failed to create muscle
    }
}

// Function to delete a muscle
function deleteMuscle($muscleId, $connection) {
    $query = "DELETE FROM muscledb.muscles WHERE muscleId = $muscleId";
    $result = mysqli_query($connection, $query);
    if ($result && mysqli_affected_rows($connection) > 0) {
        return true; // Muscle deleted successfully
    } else {
        return false; // Failed to delete muscle or muscleId not found
    }
}

// Function to update a muscle
function updateMuscle($muscleId, $name, $workout1, $workout2, $videoLink, $connection) {
    $query = "UPDATE muscledb.muscles SET name = '$name', workout1 = '$workout1', workout2 = '$workout2', videoLink = '$videoLink' WHERE muscleId = $muscleId";
    $result = mysqli_query($connection, $query);
    if ($result && mysqli_affected_rows($connection) > 0) {
        return true; // Muscle updated successfully
    } else {
        return false; // Failed to update muscle or muscleId not found
    }
}
?>
