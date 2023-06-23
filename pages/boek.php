<?php
require 'admin/conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeken</title>
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
                <li><a href="willekeurig.php">Bestemmingen</a></li>
                <?php
                // Controleer of de gebruiker is ingelogd
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    // Gebruiker is ingelogd, toon de knop 'Gebruiker'
                    echo '<li><a href="gebruiker.php">Gebruiker</a></li>';
                } else {
                    // Gebruiker is niet ingelogd, toon de knop 'Inloggen'
                    echo '<li><a href="login.php">Login</a></li>';
                }
                ?>
            </ul>
        </header>

        <?php
            // Controleren of de kamer-ID is meegegeven in de querystring
            if (isset($_GET['id'])) {
                $kamerId = $_GET['id'];

                // Voorbereiden van de databasequery om de kamerinformatie op te halen
                    $query = "SELECT * FROM `hotel-kamers` WHERE id = :kamer_id";

                    // Uitvoeren van de query met het juiste kamer ID als parameter
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':kamer_id', $kamerId, PDO::PARAM_INT);
                    $stmt->execute();

                // Controleren of de kamer is gevonden
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Toon de informatie van de kamer
                    echo "<div class='user-boekingen-box'>";
                    echo "<div class='boekingen'>";
                    echo "<div class='box'>";
                    echo "<div class='info-box'>";
                    echo "<h1>";
                    echo $row['naam'];
                    echo "</h1>";
                    echo "<h3>";
                    echo "Een mooie tijd met een magisch ontbijt. Dat zijn de dingen wat maakt dat jij hier verblijft.";
                    echo "</h3>";
                    echo "</div>";
                    echo "<div class='img'>";
                    echo "<img src='../img-reisbureau/beach.png' alt='FOTO'>";
                    echo "</div>";
                    echo "</div>";
                    echo "<form action='boeking_in_database.php?kamer_id=" . $kamerId . "' method='POST'>";
                    echo "<h2>€" . $row['prijs'] . "</h2>";
                    echo "<input type='submit' name='book' value='Boek nu'>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<p>Geen kamer gevonden met de opgegeven ID.</p>";
                }
            } else {
                echo "<p>Geen kamer-ID opgegeven.</p>";
            }
        ?>

        <!-- <div class="user-boekingen-box"> -->
            <!-- <div class="boekingen"> -->
                <!-- <div class="box"> -->
                    <!-- <div class="info-box">
                        <h1>
                            <?php
                            // echo $_SESSION['voornaam'];
                            // hotel naam
                            ?>
                        </h1>
                        <h3>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu auctor sapien. Integer rutrum in eros eu egestas. Sed egestas erat urna, pellentesque imperdiet libero placerat ac. Duis porttitor, nulla dictum lobortis posuere. -->
                            <!-- TEXTJE -->
                        <!-- </h3>
                    </div>
                    <div class="img">
                        <img src="../img-reisbureau/beach.png" alt="FOTO?">
                    </div>
                </div> -->

                <!-- JAN ZORG ERVOOR DAT JE KIJKT OF IE AL INGELOGD IS. -->
                <!-- ALS HIJ INGELOGD IS MOET JE HEM NAAR gebruiker-paginas/boekingen.php STUREN -->
                <!-- ALS HIJ NIET INGELOGD IS MOET HIJ NAAR LOGIN.PHP STUREN -->
                <!-- <div class="book-box">
                    <form action="login.php">
                        <h2>
                            13€
                        </h2>
                        <input type="submit" name="book" value="Boek nu">
                    </form>
                </div>
            </div>
        </div> -->



    </div>

    <footer>
        <a href="algemene-voorwaarden.php">Algemene voorwaarden</a>
        <a href="privacy-policy.php"> Privacy policy</a>
        <a href="contact.php">Contact</a>
        <a href="onsbedrijf.php">Ons Bedrijf</a>
    </footer>
</body>

</html>