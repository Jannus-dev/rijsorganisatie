<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/gebruiker.css">
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
        <div class="container">
            <div class="nav-container">
                <div class="nav nav-left">
                    <ul>
                        <!-- ALLEEN ALS ADMIN!! -->
                        <li>
                            <a href="../gebruiker-pagina's-admin/onderhoud.php">
                                <div class="icon">
                                    <img src="../../img-reisbureau/reparatie-icon.png" alt="moer">
                                    <p>Onderhoud</p>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="../gebruiker-pagina's-admin/boekingen-toevoegen.php">
                                <div class="icon">
                                    <img src="../../img-reisbureau/booking-add.png" alt="boek">
                                    <p>Boekingen toevoegen</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="black-line"></div>
                        </li>
                        <!-- TOT EN MET HIER -->

                        <li>
                            <a href="../gebruiker.php">
                                <div class="icon">
                                    <img src="../../img-reisbureau/User_icon_2.svg.png" alt="boek">
                                    <p>Gebruiker</p>

                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="boekingen.php">
                                <div class="icon">
                                    <img src="../../img-reisbureau/book_icon-icons.com_73655.png" alt="boek">
                                    <p>Boekingen</p>
                                    < </div>
                            </a>
                        </li>
                        <li>
                            <a href="winkel-wagen.php">
                                <div class="icon">
                                    <img src="../../img-reisbureau/shopping-cart.png" alt="boek">
                                    <p>Winkel wagen</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="wachtwoord-veranderen.php">
                                <div class="icon">
                                    <img src="../../img-reisbureau/icone-point-d-interrogation-question-jaune.png" alt="boek">
                                    <p>Wachtwoord veranderen</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nav nav-right"></div>
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