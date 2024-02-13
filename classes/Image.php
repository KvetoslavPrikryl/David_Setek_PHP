<?php

    class Image{
        public static function inserImage($connection, $user_id, $image_name){
            $sql = "INSERT INTO image (user_id, image_name) VALUES (:user_id, :image_name)";

            $stmt = $connection->prepare($sql);

            $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindValue(":image_name", $image_name, PDO::PARAM_STR);

            if($stmt->execute()){
                return true;
            }
        }

        public static function getImagesByUserId($connection, $user_id){

            $sql = "SELECT image_name FROM image WHERE user_id = :user_id";

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);

            $stmt->execute();

            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $images;
        }

        public static function deletePhotoFromDirectory($path){
            try {
                if(!file_exists($path)){
                    throw new Exception("Soubor neexistuje a proto nemůže být smazán!");
                }

                if(unlink($path)){
                    return true;
                } else {
                    throw new Exception("Při mazáni souboru došlo k chybě!");
                }
            } catch (Exception $e) {
                echo "Chyba: " . $e->getMessage(); 
            }
        }

        public static function deletePhotoFromDatabase($connection, $image_name){
            $sql = "DELETE FROM image WHERE image_name=:image_name";
            $stmt = $connection->prepare($sql);

            try{
                $stmt->bindValue(":image_name", $image_name, PDO::PARAM_STR);

                if(!$stmt->execute()){
                    throw new Exception("Nepodařilo se smazat obrázek z databáze!");
                }
            } catch (Exception $e) {
                echo "Chyba: " . $e->getMessage();
            }
        }
    }

