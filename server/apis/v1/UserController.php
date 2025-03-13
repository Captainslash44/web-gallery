<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
require("models/User.php");


class UserController{

    static function addUser(){
        if (isset($_POST["fullname"])){
            $fullname = $_POST["fullname"];
        }
        if (isset($_POST["email"])){
            $email = $_POST["email"];
        }
        if (isset($_POST["password"])){
            $password = $_POST["password"];
        }

        if(! User::getUser($email)){
            User::create($fullname, $email, $password);
            User::save();
        }
    }

    static function login(){
        if(isset($_POST["email"])){
            $email = $_POST["email"];
        }
        if(isset($_POST["password"])){
            $password = $_POST["password"];
        }

        if(User::verifyPassword($email, $password)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }

}
?>