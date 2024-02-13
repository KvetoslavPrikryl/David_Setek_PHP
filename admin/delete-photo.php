<?php   
    require "../classes/Auth.php";
    require "../classes/Image.php";
    require "../classes/Database.php";
    require "../classes/Url.php";


    session_start();

    if (!Auth::isLoggedIn()){
        die("Nepovolený přístup!");
    }

    $database = new Database();
    $connection = $database->connectionDB();

    $user_id = $_GET["id"];
    $image_name = $_GET["image_name"];

    $image_path = "../uploads/" . $user_id . "/" . $image_name;

    if(Image::deletePhotoFromDirectory($image_path)){
        Image::deletePhotoFromDatabase($connection, $image_name);
        Url::redirectUrl("/David-PHP/admin/photos.php");
    }
