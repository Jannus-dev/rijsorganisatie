<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/contact.css">
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
        <div class="box-form-contact">
            <div class="Contact">
                <h1>Contact</h1>
            </div>
            <form name="login" action="contact-verzonden.php" method="post">
                <div class="box">
                    <input type="text" name="name" placeholder="Uw naam" required autofocus>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <textarea id="message" name="bericht" placeholder="Uw bericht" required></textarea>
                <input type="submit" name="login" value="Verzenden" require_once>
            </form>
        </div>
        <!-- <div class="container">
            <h2>Contact</h2>
            <form name="contact" action="contact-submitted.php" method="post">
                <div class="information-box">
                    <input type="text" id="name" name="name" placeholder="Naam" required>
                    <input type="email" id="email" name="email" placeholder="voorbeeld@mail.com" required>
                </div>
                <textarea id="message" name="message" placeholder="Uw bericht" required></textarea>
                <input type="submit" name="submit" value="Verzenden">
            </form>
        </div> -->
    </div>


    <footer>
        <a href="algemene-voorwaarden.php">Algemene voorwaarden</a>
        <a href="privacy-policy.php"> Privacy policy</a>
        <a href="contact.php">Contact</a>
        <a href="onsbedrijf.php">Ons Bedrijf</a>
    </footer>
</body>
<?php
//  jan dit moet jij even doen en aanpassen op je onze DB. 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if ($_database["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // POST deze data in de DB!

    // Redirect to a thank you page
    header("Location: contact-submitted.php");
    exit();
}
?>

</html>