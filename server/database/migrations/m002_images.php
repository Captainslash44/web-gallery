<?php
require("../../connection/connection.php");

$query = "CREATE TABLE images (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
img_url VARCHAR(2000) NOT NULL)";

$migrate = $conn->prepare($query);
$migrate->execute();



?>