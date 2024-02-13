<?php

    $error_text = $_GET["error_text"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <section>
            <h1>Výpis chyb</h1>
            <p>Chyba: <?= $error_text?></p>
            <a href="../admin/students.php">Zbět na úvodní stranu.</a>
        </section>
    </main>

</body>
</html>