<?php

include("ImageSkeleton.php");
require("connection/connection.php");

class Image extends ImageSkeleton{

    public static function all(){
        global $conn;

        $query = $conn->prepare("SELECT img_url FROM images");
        $query->execute();
        $result = $query->get_result();
        $imageURLS = [];
        while($i = $result->fetch_assoc()){
            $imageURLS[] = $i;
        }

        return $imageURLS;
    }


    public static function upload(){
        global $conn;

        $query = $conn->prepare("INSERT INTO images (img_url) VALUE(?)");
        $query->bind_param("s", self::$url);
        $query->execute();

        return true;

    }


    public static function delete($url){
        global $conn;

        $query = $conn->prepare("DELETE FROM images where img_url = ?");
        $query->bind_param("s", $url);
        $query->execute();
        
        return true;
    }
}