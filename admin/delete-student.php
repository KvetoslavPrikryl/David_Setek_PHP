<?php

require "../classes/Database.php";
require "../classes/Student.php";
require "../classes/Auth.php";
require "../classes/Url.php";

session_start();

if (!Auth::isLoggedIn()){
    die("Nepovolený přístup!");
}

$role = $_SESSION["role"];

//$connection = connectionDB();
$database = new Database();
$connection = $database->connectionDB();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(Student::deleteStudent($connection, $_GET["id"])){
        Url::redirectURL("/David-PHP/admin/students.php");
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
    <link rel="stylesheet" href="../query/header-query.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/admin-delete-student.css">
    <script src="https://kit.fontawesome.com/f510a84cae.js" crossorigin="anonymous"></script>
    <title>Smazat žáka</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
    <main>
        <?php if($role === "admin"): ?>
            <section class="delete-form">
                <form method="POST">
                    <p>Jste si jisti že chcete smazat žáka.</p>
                    <div class="btns">
                        <button>Smazat</button>
                        <a href="one-student.php?id=<?= $_GET["id"]?>">Zrušit</a>
                    </div>
                </form>
            </section>
        <?php else: ?>
            <section class="info-box">
                <h1>Obsah této stránky je k&nbsp;dispozici pouze administrátorům!</h1>
            </section>
        <?php endif; ?>
        
    </main>
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>

</body>
</html>
