<?php

function saveToText($array) {
    $json = json_encode($array);
    $file = fopen($_SERVER['DOCUMENT_ROOT']."/workoutlist.txt", 'w');
    fwrite($file, $json);
    fclose($file);
    return "File Saved";
}

function displayText() {
    $my_arr = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/workoutlist.txt"), true);
    return $my_arr;
}

if (isset($_POST['workoutList'])) {
    $workoutList = json_decode($_POST['workoutList'], true);
    saveToText($workoutList);
}
?>
