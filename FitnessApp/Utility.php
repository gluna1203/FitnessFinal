<?php

function saveToText($array){
    $json = json_encode($array);
    $file = fopen("..\\workoutlist.txt", 'w');
    fwrite($file, $json);
    fclose($file);
    return "File Saved";
}

function displayText(){
    $my_arr = json_decode(file_get_contents('..\\workoutlist.txt'), true);
    return $my_arr;
}
?>