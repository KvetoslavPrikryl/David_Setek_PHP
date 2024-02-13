<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="query/header-query.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/registration.css">
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php"; ?>
    <main>
        <section class="registration-form">
            <h1>Registrace</h1>
            <form action="admin/after-registration.php" method="POST">
                <input type="text" class="input" name="first-name" placeholder="Křestní jméno"><br>
                <input type="text" class="input" name="second-name" placeholder="Příjmení"><br>
                <input type="email" class="input" name="email" placeholder="E-mail"><br>
                <input type="password" class="input" id="password1" name="password" placeholder="Heslo"><br>
                <input type="password" class="input" id="password2" name="password-again" placeholder="Heslo znovu"><br>
                <p class="result-text"></p>
                <input type="submit" class="button" value="Zaregistrovat se">
            </form>
        </section>
    </main>
    <?php require "assets/footer.php"; ?>
    <script src="./js/header.js"></script>
    <script src="./js/passwordChecker.js"></script>
</body>
</html>