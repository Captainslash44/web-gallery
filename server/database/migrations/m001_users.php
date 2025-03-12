<?php
require("../../connection/connection.php");

$query = "CREATE TABLE users (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL)";

$migrate = $conn->prepare($query);
$migrate->execute();

?>