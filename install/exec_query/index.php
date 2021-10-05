<?php
date_default_timezone_set("Asia/Jakarta");
$path = __DIR__ . '/../config.json';
if (file_exists($path)) {
    $string = file_get_contents($path);
    $data = json_decode($string, true);
} else {
    $data['url'] = '/';
}
try {
    $conn = mysqli_connect($data['db_host'], $data['db_username'], $data["db_password"],  $data['db_name']);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
    } else {
        $sql = "INSERT INTO `users` (`id`, `name`, `username`, `password`, `role_id`, `image`, `is_active`,`date_created`) VALUES (NULL, '".$data['admin_username']."', '".$data['admin_username']."', '".md5($data['admin_password'])."', '1', 'd1.jpg', '1','".date('Y-m-d H:i:s')."')";
        if ($result = mysqli_query($conn, $sql)) {
            echo 'run sql successfully';
            header('Location: ../..');
        } else {
            echo 'query excecution error : ' . $conn->error;
        }
    }
    $conn->close();
} catch (Exception $e) {
    echo "Somenting wrong : " . $e->getMessage();
}
