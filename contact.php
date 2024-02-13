<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/PHPMailer/src/Exception.php';
    require 'vendor/PHPMailer/src/PHPMailer.php';
    require 'vendor/PHPMailer/src/SMTP.php';

    $first_name = "";
    $second_name = "";
    $email = "";
    $message = "";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $first_name = $_POST["first-name"];
        $second_name = $_POST["second-name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        $errors = [];

        if($first_name === ""){
            $errors[] = "Prosím vyplňte Vaše jméno!";
        } 
        
        if($second_name === ""){
            $errors[] = "Prosím vyplňte Vaše příjmení!";
        } 
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL === false)){
            $errors[] = "Prosím vyplňte Váš e-mail!";
        } 
        
        if ($message === ""){
            $errors[] = "Prosím vyplňte text v poli zpráva!";
        }

        if(empty($errors)){
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP(); 
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = "kveta.prikryl@gmail.com";                     
                $mail->Password   = "nsumwqlkmininucd";                               
                $mail->SMTPSecure = "TLS";           
                $mail->Port       = 587;

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->CharSet = "UTF-8";
                $mail->Endcoding = "base64";

                $mail->setFrom('kveta.prikryl@gmail.com');
                $mail->addAddress('kveta.prikryl@seznam.cz'); // druhý email kam se zpráva pošle.
                $mail->Subject = $email;
                $mail->Body    = "Jméno: {$first_name} {$second_name} \nEmail: {$email} \n{$message}";

                $mail->send();

                echo "Byl odeslán email.";
            } catch( Exception $e){
                echo "Zpráva nebyla odeslána", $mail->ErrorInfo;
            }
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="query/header-query.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/contact.css">
    <title>Document</title>
</head>
<body>
    <?php require "assets/header.php"; ?>
    <main>
        <section class="errors">
            <?php if(!empty($errors)): ?>
                <ul>
                    <?php foreach($errors as $one_error): ?>
                        <li><?= $one_error; ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif; ?>
        </section>
        <section class="form">
            <h1>Kontaktní formůlář</h1>
            <form action="contact.php" method="POST">
                <input 
                        type="text" 
                        name="first-name" 
                        placeholder="Křestní jméno" 
                        value="<?= $first_name; ?>"
                        required
                        ><br>
                <input 
                        type="text" 
                        name="second-name" 
                        placeholder="Příjmení" 
                        value="<?= $second_name; ?>"
                        required><br>
                <input 
                        type="email" 
                        name="email" 
                        placeholder="E-mail" 
                        value="<?= $email; ?>"
                        required><br>
                <textarea 
                        name="message" 
                        placeholder="Vaše zpráva" 
                        required><?= $message; ?></textarea><br>

                <button>Odeslat</button>
            </form>
        </section>
    </main>
    <?php require "assets/footer.php"; ?>

    <script src="./js/header.js"></script>
</body>
</html>