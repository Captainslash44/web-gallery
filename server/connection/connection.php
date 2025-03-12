<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "webgallerydb";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error){
    http_response_code(404);
    echo "Error connecting";
}
?>