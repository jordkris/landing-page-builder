<?php

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function get_data()
    {
        return json_encode($_POST);
    }
    $name = "config";
    $file_name = '../'.$name . '.json';

    if (file_put_contents("$file_name", get_data())) {
        echo $file_name . ' file created';
        sleep(3);
        header('Location: ../exec_query');
    } else {
        echo 'There is some error';
    }
} else {
    $string = file_get_contents("../config.json");
    $json = json_decode($string, true);
    print_r($json);
}
