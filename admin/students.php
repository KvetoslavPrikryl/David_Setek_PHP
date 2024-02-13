<?php

   require "../classes/Database.php";
   require "../classes/Student.php";
   require "../classes/Auth.php";
 
   
    session_start();

    if (!Auth::isLoggedIn()){
        die("Nepovolený přístup!");
    }

   //$connection = connectionDB();
    $database = new Database();
    $connection = $database->connectionDB();

   $students = Student::getAllStudents($connection, "first_name, second_name, id");

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
    <link rel="stylesheet" href="../css/admin-students.css">
    <script src="https://kit.fontawesome.com/f510a84cae.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
    <main>
        <section class="main-heading">
            <h1>Seznam žáků školy</h1>
        </section>

        <section class="filter">
            <input type="text" class="filter-input">
        </section>
        
        <section class="student-list">
            <?php if(empty($students)): ?>
                <p>Žádní žácí nebyli nalezeni</p>
            <?php else: ?>
                <div class="all-students">
                    <?php foreach($students as $one_student): ?>
                        <div class="one-student">
                            <h2>
                                <?php echo htmlspecialchars($one_student["first_name"])." ".htmlspecialchars($one_student["second_name"]) ?>
                            </h2>
                            <a href="one-student.php?id=<?= $one_student["id"] ?>">Více informací</a>
                        </div>
                    <?php endforeach; ?>
                </div>
                
            <?php endif; ?><br>
        </section>
    </main>
  
    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
    <script src="../js/filter.js"></script>
    
</body>
</html>