
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
                <li><a href="../willekeurig.php">Bestemmingen</a></li>
                <li><a href="../gebruiker.php">Gebruiker</a></li>
            </ul>
        </header>
        <div class="container">
            <div class="nav-container">
                <div class="nav nav-left">
                    <ul>
                        <!-- ALLEEN ALS ADMIN!! -->
                        <?php
                        session_start();
                        if ($_SESSION['rol'] <= 10) {
                            echo "<li>";
                            echo "<a href='../gebruiker-paginas-admin/onderhoud.php'>";
                            echo "<div class='icon'>";
                            echo "<img src='../../img-reisbureau/reparatie-icon.png' alt='moer'>";
                            echo "<p>Onderhoud</p>";
                            echo "</div>";
                            echo "</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='../gebruiker-paginas-admin/boekingen-toevoegen.php'>";
                            echo "<div class='icon'>";
                            echo "<img src='../../img-reisbureau/booking-add.png' alt='boek'>";
                            echo "<p>Boekingen toevoegen</p>";
                            echo "</div>";
                            echo "</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<div class='black-line'></div>";
                            echo "</li>";
                        }
                        ?>
                        <!-- TOT EN MET HIER -->

                        <a href="../gebruiker.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/User_icon_2.svg.png" alt="boek">
                                <p>Gebruiker</p>
                            </div>
                        </a>
                        <a href="../gebruiker-paginas/boekingen.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/book_icon-icons.com_73655.png" alt="boek">
                                <p>Boekingen</p>
                            </div>
                        </a>
                        <a href="../gebruiker-paginas/winkel-wagen.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/shopping-cart.png" alt="boek">
                                <p>Winkel wagen</p>
                                < </div>
                        </a>
                        <a href="../gebruiker-paginas/wachtwoord-veranderen.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/icone-point-d-interrogation-question-jaune.png" alt="boek">
                                <p>Wachtwoord veranderen</p>
                            </div>
                        </a>
                    </ul>
                </div>
                <div class="nav nav-right"></div>
            </div>
        </div>
    </div>

    <?php include_once("../../footer-2.php"); ?>

</body>

</html>