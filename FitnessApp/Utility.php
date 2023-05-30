<?php

$user = $_SERVER['AUTH_USER'];

function saveToText($array){
    $json = json_encode($array);
    $file = fopen("..\\workoutlist.txt", 'w');
    fwrite($file, $json);
    fclose($file);
    return "File Saved";
}
?>