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
    $query = "SELECT * FROM muscles WHERE areaId = $areaId";
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
?>
