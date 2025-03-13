<?php

require("models/User.php");

// echo json_encode(User::verifyPassword("enyemail", "anypasswod"));


// echo json_encode(User::getUser("emai"));


class test{
    static function test(){
        $targetDir = "uploads/";
        // if(isset($_FILES["file"])){
        //     $fileName = basename($_FILES["file"]["name"]);
        //     $targetFilePath = $targetDir . $fileName;
        //     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        //     echo json_encode($fileType);
        //     $allowTypes = ['jpg', 'png', 'jpeg', 'pdf', 'gif', 'avif'];
        //     if(in_array($fileType, $allowTypes)){
        //         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
        //     echo json_encode("success");
        // }
        // echo json_encode($targetFilePath. " ");
        // echo json_encode($fileType);
        echo json_encode($_FILES);
        

    }
}
// }
// }

?>