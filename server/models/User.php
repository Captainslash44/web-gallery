<?php

include("UserSkeleton.php");
require("connection/connection.php");


class User extends UserSkeleton{

    public static function save(){
    global $conn;

    $query = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    $hash = password_hash(self::$password, PASSWORD_BCRYPT);
    $query->bind_param("sss", self::$fullname, self::$email, $hash);
    $query->execute();

    return true;
}


public static function getUser($email){
    global $conn;

    $query = $conn->prepare("SELECT * FROM users where email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if(mysqli_num_rows($result) === 0){
        return false;
    }else{
        $response = [];
        while ($i = $result->fetch_assoc()){
            $response[] = $i; 
        }
        return $response;
    }
}


public static function verifyPassword($email, $password){
    global $conn;

    $query = $conn->prepare("SELECT password FROM users where email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if(mysqli_num_rows($result) == 0){
        return $query->num_rows;
    }else{
        $hash = $result->fetch_assoc()["password"];

        if(password_verify($password,$hash)){
            return true;
        }else{
            return false;
        }
    }
}

public static function getAll(){
    global $conn;

    $query = $conn->prepare("SELECT * FROM users");
    $query->execute();
    $result = $query->get_result();
    $response = [];
    while ($i = $result->fetch_assoc()){
        $response[] = $i;
    }

    return $response;
}

}

