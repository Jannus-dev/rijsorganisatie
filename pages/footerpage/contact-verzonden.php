<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/contact-verzonden.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Laila:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background">
        <header>
            <div class="logo">
                <a href="../../index.php">
                    <img src="../../img-reisbureau\main-logo.jpg" alt="Logo">
                </a>
            </div>
            <ul>
                <li><a href="../bestemmingen.php">Bestemmingen</a></li>
                <li><a href="../willekeurig.php">Willekeurig</a></li>
                <li> <a href="../login.php">Login</a></li>
            </ul>
        </header>
        <div class="textbox-container">
            <div class="textbox">
                <?php
                echo "<h1>Bedankt voor het versturen van je bericht!</h1>";
                echo "<p>Deze pagina sluit automatisch af!</p>";
                header("Refresh:5; url=../../index.php", true, 303);
                exit();
                ?>
            </div>
        </div>
    </div>

    <footer>
        <a href="algemene-voorwaarden.php">Algemene voorwaarden</a>
        <a href="privacy-policy.php"> Privacy policy</a>
        <a href="contact.php">Contact</a>
        <a href="onsbedrijf.php">Ons Bedrijf</a>
    </footer>
</body>


</html>