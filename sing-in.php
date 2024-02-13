<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="query/header-query.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/sign-in.css">
    <script src="https://kit.fontawesome.com/f510a84cae.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php"; ?>
    <main>
        <section class="form">
            <h1>Přihlášení</h1>
            <form action="admin/login.php" method="POST">
                <input type="email" class="email" name="login-email" placeholder="E-mail"><br>
                <input type="password" class="password" name="login-password" placeholder="Heslo"><br>
                <input type="submit" class="button" value="Přihlásit se">
            </form>
        </section>
    </main>
    <?php require "assets/footer.php"; ?>

    <script src="./js/header.js"></script>
</body>
</html>