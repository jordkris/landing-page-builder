<?php
header('Content-Type: application/json');
$response = new \stdClass;
// $path = __DIR__ . '/../config.json';

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
try {
    // $string = file_get_contents($path);
    // $data = json_decode($string, true);
    $conn = mysqli_connect($_GET['db_host'], $_GET['db_username'], $_GET["db_password"], 'information_schema');
    // Check connection
    if (mysqli_connect_errno()) {
        $response->message = "Failed to connect to MySQL: " . $conn->connect_error;
        $response->status = 500;
    } else {
        // $db_name = 'weboxorder_demo';
        // Perform query
        // $sql = 'SELECT SCHEMA_NAME FROM SCHEMATA WHERE SCHEMA_NAME = ' . $data['db_name'];
        $sql = 'SELECT SCHEMA_NAME FROM SCHEMATA WHERE SCHEMA_NAME = "' . $_GET['db_name'] . '"';
        // $result = $conn->query($sql);
        if ($result = mysqli_query($conn, $sql)) {
            if ($result->num_rows > 0) {
                $response->message = 'database found';
                $response->status = 200;
            } else {
                $response->message = 'database not found';
                $response->status = 500;
            }
        } else {
            $response->message = 'query excecution error';
            $response->status = 500;
        }
        // print_r(mysqli_query($conn, $sql));
        // echo 'haha';
        // if ($result === false) {
        //     echo 'error';
        // } else {
        //     echo 'with result';
        // }
        //     }
        // } else {
        //     $response->message = '0 result';
        //     $response->status = 201;
        // }
    }
    $conn->close();
} catch (Exception $e) {
    $response->message = "Somenting wrong : " . $e->getMessage();
    $response->status = 500;
}
// } else {
//     $response->message = "GET request unavailble";
//     $response->status = 500;
// }
print_r(json_encode($response));
