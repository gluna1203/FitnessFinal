<?php

define("DB_USER", "root");
define("DB_PSWD", "Neumont#23"); // Add password
define("DB_SERVER", "localhost"); // Value might change depending on the MySQL installation
define("DB_NAME", "muscledb"); // Might be different on your PC

function ConnGetB() {
    $dbConn = mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME)
        or die("Failed to connect to the database: " . mysqli_connect_error());
    return $dbConn;
}

if (isset($_POST['create'])) {
    $conId = $_POST['conId'];
    $name = $_POST['name'];
    $manufacturer = $_POST['manufacturer'];
    $unitsSold = $_POST['unitsSold'];
    $releaseYear = $_POST['releaseYear'];

    echo "<script>alert('conId: $conId, name: $name, manufacturer: $manufacturer, unitsSold: $unitsSold, releaseYear: $releaseYear');</script>";

    create($conId, $name, $manufacturer, $unitsSold, $releaseYear);
}

/*
if (isset($_POST['update'])) {
    $conId = $_POST['conId'];
    $name = $_POST['name'];
    $manufacturer = $_POST['manufacturer'];
    $unitsSold = $_POST['unitsSold'];
    $releaseYear = $_POST['releaseYear'];

    echo "<script>alert('conId: $conId, name: $name, manufacturer: $manufacturer, unitsSold: $unitsSold, releaseYear: $releaseYear');</script>";

    update($conId, $name, $manufacturer, $unitsSold, $releaseYear);
}

if (isset($_POST['delete'])) {
    $val = $_POST['conId'];
    deleteOne($val);
}

*/

if (isset($_POST['readAll'])) {
    $sql = "SELECT * FROM muscledb.muscles";
    $result = ConnGetB()->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $muscleId = $record['muscleId'];
        $areaId = $record['areaId'];
        $name = $record['name'];
        $workout1 = $record['workout1'];
        $workout2 = $record['workout2'];
        $videoLink = $record['videoLink'];
            $alertMessage = "muscleId: $muscleId, areaId: $areaId ,name: $name, workout1: $workout1, workout2: $workout2";
            echo "<p style='text-align: center;'>$alertMessage</p><br>";
        }
    }else {
        echo "<script>alert('Records not found');</script>";
    }
}

/*
// Create
function create($workout, $name) {
    $dbConn = ConnGetB();

    $sql = "INSERT INTO muscledb.workouts (workout, name)
            VALUES ('$workout', '$name')";

    if ($dbConn->query($sql) === TRUE) {
        echo "Record created successfully";
    } else {
        echo "Error creating record: " . $dbConn->error;
    }

    $dbConn->close();
}
*/

// Read
function readAll() {
    $dbConn = ConnGetB();
    $sql = "SELECT * FROM muscledb.muscles";
    $result = $dbConn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            // Display the array or perform any necessary operations
            echo "Muscles ID: " . $row['muscleId'] .  ", Area ID: " . $row['areaId'] . " ,Name: " . $row['name'] . ", workout1: " . $row['workout1'] . ", workout2: " . $row['workout2'] . ", videoLink: " . $row['videoLink'] . "<br>";
        }
    } else {
        echo "No records found";
    }

    $dbConn->close();
}
/*


//read by ID
function getRecordById($conId) {
    $sql = "SELECT * FROM consoles.consoles WHERE conId = '$conId'";
    $result = ConnGetB()->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row;
    } else {
        return null;
    }
}


// Update
function update($conId, $name, $manufacturer, $unitsSold, $releaseYear) {
    $dbConn = ConnGetB();

    $sql = "UPDATE consoles.consoles SET name='$name', manufacturer='$manufacturer', unitsSold='$unitsSold', releaseYear='$releaseYear' WHERE conId='$conId'";

    if ($dbConn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $dbConn->error;
    }

    $dbConn->close();
}


// Delete
function deleteOne($conId) {
    $dbConn = ConnGetB();
    $sql = "DELETE FROM consoles.consoles WHERE conId='$conId'";
    $dbConn->query($sql) === TRUE || die("Error deleting record: " . $dbConn->error);
    $dbConn->close();
}


*/
?>
