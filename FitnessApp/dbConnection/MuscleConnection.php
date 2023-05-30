<?php
DEFINE("DB_USER", "root");
DEFINE("DB_PSWD", "Neumont#23"); // Add password
DEFINE("DB_SERVER", "localhost"); // Value might change depending on mysql install
DEFINE("DB_NAME", "muscledb"); // Might be diff on your pc

function ConnGetB() {
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME)
        or die("Failed to connect to the db " . DB_SERVER . '::' . DB_NAME . " : " . mysqli_connect_error());
    return $dbConn;
}

function getOneMuscleArea($areaId){

}

function getAllMuscleAreas(){

}

function getAllMuscles(){
    
}

function getOneMuscle($muscleId){
    
}


?>