<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
require("models/User.php");

// echo json_encode(User::verifyPassword("enyemail", "anypasswod"));


// echo json_encode(User::getUser("emai"));


class test{
    static function test(){
        // $targetDir = "uploads/";
        // // if(isset($_FILES["file"])){
        // //     $fileName = basename($_FILES["file"]["name"]);
        // //     $targetFilePath = $targetDir . $fileName;
        // //     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        // //     echo json_encode($fileType);
        // //     $allowTypes = ['jpg', 'png', 'jpeg', 'pdf', 'gif', 'avif'];
        // //     if(in_array($fileType, $allowTypes)){
        // //         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
        // //     echo json_encode("success");
        // // }
        // // echo json_encode($targetFilePath. " ");
        // // echo json_encode($fileType);
        // echo json_encode($_FILES);
        
        $email = $_POST["email"];
        $password = $_POST["password"];

        echo json_encode(User::getUser($email)[0]["id"]);

    }
}
// }
// }

?>