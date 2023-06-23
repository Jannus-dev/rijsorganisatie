<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerken</title>
    <link rel="stylesheet" href="../../css/onderhoud.css">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/gebruiker.css">
    <link rel="stylesheet" href="../../css/gebruiker-pagina.css">
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
                <li> <a href="gebruiker.php">Gebruiker</a></li>
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
                            echo "<a href='onderhoud.php'>";
                            echo "<div class='icon'>";
                            echo "<img src='../../img-reisbureau/reparatie-icon.png' alt='moer'>";
                            echo "<p>Onderhoud</p>";
                            echo "< </div>";
                            echo "</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href='boekingen-toevoegen.php'>";
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
                        <!-- <li>
                            <a href="gebruiker-pagina's-admin/onderhoud.php">
                                <div class="icon">
                                    <img src="../img-reisbureau/reparatie-icon.png" alt="moer">
                                    <p>Onderhoud</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="gebruiker-pagina's-admin/boekingen-toevoegen.php">
                                <div class="icon">
                                    <img src="../img-reisbureau/booking-add.png" alt="boek">
                                    <p>Boekingen toevoegen</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="black-line"></div>
                        </li> -->
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
                            <a href="../gebruiker-paginas/boekingen.php">
                                <div class="icon">
                                    <img src="../../img-reisbureau/book_icon-icons.com_73655.png" alt="boek">
                                    <p>Boekingen</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="../gebruiker-paginas/winkel-wagen.php">
                                <div class="icon">
                                    <img src="../../img-reisbureau/shopping-cart.png" alt="boek">
                                    <p>Winkel wagen</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="../gebruiker-paginas/wachtwoord-veranderen.php">
                                <div class="icon">
                                    <img src="../../img-reisbureau/icone-point-d-interrogation-question-jaune.png" alt="boek">
                                    <p>Wachtwoord veranderen</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nav nav-right">
<?php
// Verbinding maken met de database (conn.php)
require_once '../admin/conn.php';

// Controleren of een gebruikers-ID is doorgegeven via de URL
if (isset($_GET['id'])) {
    $gebruikerId = $_GET['id'];

    // Query om de gebruikersgegevens op te halen
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $gebruikerId);
    $stmt->execute();

    // Controleren of de gebruiker is gevonden
    if ($stmt->rowCount() > 0) {
        $gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);
        $voornaam = $gebruiker['voornaam'];
        $achternaam = $gebruiker['achternaam'];
        $email = $gebruiker['email'];
        $wachtwoord = $gebruiker['wachtwoord'];
        $rol = $gebruiker['rol'];

        // Toon het bewerkingsformulier met de huidige gegevens
        echo "<h2>Bewerk gebruiker</h2>";
        echo "<form name='bewerken' action='opslaan-gebruiker.php' method='post'>";
        echo "<input type='hidden' name='gebruiker_id' value='" . $gebruikerId . "'>";
        echo "<input type='text' placeholder='Voornaam' name='voornaam' value='" . $voornaam . "' required>";
        echo "<input type='text' placeholder='Achternaam' name='achternaam' value='" . $achternaam . "' required>";
        echo "<input type='text' placeholder='Email' name='email' value='" . $email . "' required>";
        echo "<input type='password' id='wachtwoord' name='wachtwoord' placeholder='Wachtwoord' value='" . $wachtwoord . "' required>";
        echo "<input type='number' title='100 is standaard, 10 is admin' placeholder='Rol level' name='rol' value='" . $rol . "' required>";
        echo "<input type='submit' name='opslaan' value='Opslaan'>";
        echo "</form>";
    } else {
        echo "Gebruiker niet gevonden.";
    }
} else {
    echo "Gebruikers-ID ontbreekt.";
}
?>
                <div class="checkbox-box">
                    <input type="checkbox" id="check" name="check" onclick="myFunction()">
                    <label>Toon wachtwoord</label>
                </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function myFunction() {
        const x = document.getElementById("wachtwoord");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>