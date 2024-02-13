<?php

class Student{
    public static function getStudent($connection, $id, $colums = "*"){
        $sql = "SELECT $colums FROM student WHERE id = :id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        try {
            if($stmt->execute()){                                    
                return $stmt->fetch();
            }else{
                throw new Exception("Získání dat o jednom studentovi selhalo!");
            }
        }
        catch (Exception $e) {
            error_log("Chyba u funkce getStudent. \n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }  
    }

    public static function updateStudent($connection, $first_name, $second_name, $age, $life, $college, $id){

        $sql = "UPDATE student
                    SET first_name = :first_name,
                        second_name = :second_name,
                        age = :age,
                        life = :life,
                        college = :college
                    WHERE id = :id";
        
        $stmt = $connection->prepare($sql);

        $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
        $stmt->bindValue(":age", $age, PDO::PARAM_INT);
        $stmt->bindValue(":life", $life, PDO::PARAM_STR);
        $stmt->bindValue(":college", $college, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        try {
            if($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Update studenta se nezdařil.");
            }
        } catch( Exception $e) {
            error_log("Chyba u funkce updateStudent. \n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }
        
    }

    public static function deleteStudent($connection, $id){

        $sql = "DELETE FROM student WHERE id=:id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        try {
            if ($stmt->execute()){
                return true;
            } else {
                throw new Exception("Nepodařilo se smazat studenta!");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce deleteStudent. \n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }

    }

    public static function getAllStudents($connection, $colums = "*"){

        $sql = "SELECT $colums FROM student";
        
        $stmt = $connection->prepare($sql);

        try {
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                throw new Exception("Nepodařilo se načíst seznam studentů z databáze! ");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce getAllStudent. \n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }
        
    }

    public static function createStudent($connection, $first_name, $second_name, $age, $life, $college){

        $sql = "INSERT INTO student (first_name, second_name, age, life, college)
            VALUES (:first_name, :second_name, :age, :life, :college)";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(":first_name", $first_name, PDO::PARAM_STR);
        $stmt->bindValue(":second_name", $second_name, PDO::PARAM_STR);
        $stmt->bindValue(":age", $age, PDO::PARAM_INT);
        $stmt->bindValue(":life", $life, PDO::PARAM_STR);
        $stmt->bindValue(":college", $college, PDO::PARAM_STR);
        
        try {
            if ($stmt->execute()){                              
                $id = $connection->lastInsertId();
                return $id;
            } else {
                throw new Exception("Vytvořit studenta se nepodařilo!");
            }
        } catch (Exception $e) {
            error_log("Chyba u funkce createStudent. \n", 3, "../errors/error.log");
            echo "Typ chyby: " . $e->getMessage();
        }
    }
}