<?php

class Database {
    
    public function connectionDB(){
        $db_host = "localhost";
        $db_user = "admin";
        $db_password = "";
        $db_name = "skola";
    
       // $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        $connection = "mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8";

        // if (mysqli_connect_error()){
        //     echo mysqli_connect_error();
        //     exit;
        // }
    
        // return $connection;

        try {
            $db = new PDO($connection, $db_user, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}