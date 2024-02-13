<?php
    require "../classes/Database.php";
    require "../classes/Auth.php";
    require "../classes/Url.php";
    require "../classes/Image.php";

    session_start();

    if (!Auth::isLoggedIn()){
        die("Nepovolený přístup!");
    }

    $user_id = $_SESSION["logged_in_user_id"];

    if(isset($_POST["submit"]) && isset($_FILES["image"])){

        $database = new Database();
        $connection = $database->connectionDB();

        $image_name = $_FILES["image"]["name"];
        $image_size = $_FILES["image"]["size"];
        $image_tmp_name = $_FILES["image"]["tmp_name"];
        $error = $_FILES["image"]["error"];

        if($error === 0){
            if($image_size > 9000000){
                URL::redirectURL("/David-PHP/errors/error-page.php?error_text=Váš soubor je příliš velký!");
            } else {
                $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                $image_extension_lower_case = strtolower($image_extension);

                $alloved_extension = ["jpg", "png", "jpeg"];

                if(in_array($image_extension_lower_case, $alloved_extension)){
                    $new_image_name = uniqid("IMG-", true) . "." . $image_extension_lower_case;
                    if(!file_exists("../uploads/" . $user_id)){
                        mkdir("../uploads/" . $user_id, 0777, true);
                    }

                    $image_upload_path = "../uploads/" . $user_id . "/" . $new_image_name;
                    move_uploaded_file($image_tmp_name, $image_upload_path);

                    if(Image::inserImage($connection, $user_id, $new_image_name)){
                        URL::redirectURL("/David-PHP/admin/photos.php");
                    }
                    
                } else {
                    URL::redirectURL("/David-PHP/errors/error-page.php?error_text=Koncovka Vašeho souboru není povolená!");
                }
            }
        } else {
            URL::redirectURL("/David-PHP/errors/error-page.php?error_text=Vložit obrázek se bohužel nepovedlo!");
        }
    }
?>