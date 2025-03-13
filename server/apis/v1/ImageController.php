<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
require("models/Image.php");


class ImageController{

    static function loadImages(){ echo json_encode(Image::all());}

    static function uploadImage(){
        $targetDir = "uploads/";
        if(isset($_FILES["file"])){
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = ['jpg', 'png', 'jpeg', 'pdf', 'gif', 'avif'];
            if(in_array($fileType, $allowTypes)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    Image::create($targetFilePath);
                    Image::upload();
                    echo json_encode(true);
                } else { echo json_encode(false);}
            }else { echo json_encode(false);}
        }else { echo json_encode(false);}
    }



}

?>