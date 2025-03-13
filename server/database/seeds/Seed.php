<?php
require("models/User.php");
require("apis/v1/ImageController.php");
require("connection/connection.php");


class Seed{

    public static function Userseeder(){
        $mainUser = ["fullname" => "Halim Njeim", "email" => "michaelnjeim44@gmail.com", "password" => "Halim123"];
        User::create($mainUser["fullname"], $mainUser["email"], $mainUser["password"]);
        User::save();
    }
}




?>