<?php 
    require "../classes/Database.php";
    require "../classes/Url.php";
    require "../classes/Student.php";
    require "../classes/Auth.php";

   
    session_start();

    if (!Auth::isLoggedIn()){
        die("Nepovolený přístup!");
    }
    //$connection = connectionDB();
    $database = new Database();
    $connection = $database->connectionDB();

    $role = $_SESSION["role"];

    if(isset($_GET["id"])){
        $one_student = Student::getStudent($connection, $_GET["id"]);
        if($one_student){
            $first_name = $one_student["first_name"];
            $second_name = $one_student["second_name"];
            $age = $one_student["age"];
            $life = $one_student["life"];
            $college = $one_student["college"];
            $id = $one_student["id"];
        } else {
            die("Student nenalezen!");
        }
      
    } else {
        die("ID nebylo zadáno, student nemohl být nalezeb!");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $age = $_POST["age"];
        $life = $_POST["life"];
        $college = $_POST["college"];

        if(Student::updateStudent($connection, $first_name, $second_name, $age, $life, $college, $id)){
            Url::redirectURL("/David-PHP/admin/one-student.php?id=$id");
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/admin-edit-student.css">
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../query/admin-edit-student-query.css">
    <script src="https://kit.fontawesome.com/f510a84cae.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
    <main>
        <?php if($role === "admin"):?>
            <section class="add-form">
                <?php require "../assets/form-student.php"; ?>
            </section>
        <?php else: ?>
            <h1>Obsah této stránky je k dispozici pouze administrátorům!</h1>
        <?php endif; ?>
        
    </main>
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>

</body>
</html>