<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/boek.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Laila:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background">
        <header>
            <div class="logo">
                <a href="../index.php">
                    <img src="../img-reisbureau\main-logo.jpg" alt="Logo">
                </a>
            </div>
            <ul>
                <li><a href="bestemmingen.php">Bestemmingen</a></li>
                <li><a href="willekeurig.php">Willekeurig</a></li>
                <li> <a href="login.php">Login</a></li>
            </ul>
        </header>

        <div class="user-boekingen-box">
            <div class="boekingen">
                <div class="box">
                    <div class="info-box">
                        <h1>
                            <?php
                            echo $_SESSION['voornaam'];
                            // hotel naam
                            ?>
                        </h1>
                        <h3>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu auctor sapien. Integer rutrum in eros eu egestas. Sed egestas erat urna, pellentesque imperdiet libero placerat ac. Duis porttitor, nulla dictum lobortis posuere.
                            <!-- TEXTJE -->
                        </h3>
                    </div>
                    <div class="img">
                        <img src="../img-reisbureau/beach.png" alt="FOTO?">
                    </div>
                </div>

                <!-- JAN ZORG ERVOOR DAT JE KIJKT OF IE AL INGELOGD IS. -->
                <!-- ALS HIJ INGELOGD IS MOET JE HEM NAAR gebruiker-paginas/boekingen.php STUREN -->
                <!-- ALS HIJ NIET INGELOGD IS MOET HIJ NAAR LOGIN.PHP STUREN -->
                <div class="book-box">
                    <form action="login.php">
                        <h2>
                            13€
                        </h2>
                        <input type="submit" name="book" value="Boek nu">
                    </form>
                </div>
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