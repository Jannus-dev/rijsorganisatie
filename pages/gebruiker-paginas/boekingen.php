<?php
    require_once '../admin/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boekingen</title>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/gebruiker.css">
    <link rel="stylesheet" href="../../css/boekingen.css">
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
                                < </div>
                        </a>
                        <a href="../gebruiker-paginas/winkel-wagen.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/shopping-cart.png" alt="boek">
                                <p>Winkel wagen</p>
                            </div>
                        </a>
                        <a href="../gebruiker-paginas/wachtwoord-veranderen.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/icone-point-d-interrogation-question-jaune.png" alt="boek">
                                <p>Wachtwoord veranderen</p>
                            </div>
                        </a>
                    </ul>
                </div>

                <?php
                $gebruikerId = $_SESSION['gebruiker_id'];

                // Voorbereiden van de databasequery om boekingen op te halen
                $query = "SELECT b.*, hk.naam AS hotelkamer_naam
                          FROM boekingen b
                          INNER JOIN `hotel-kamers` hk ON b.hotel_kamer_id = hk.id
                          WHERE b.gebruiker_id = :gebruiker_id";
                $stmt = $conn->prepare($query);
                $stmt->bindValue(':gebruiker_id', $gebruikerId, PDO::PARAM_INT);
                $stmt->execute();
                ?>
                <div class="nav nav-right">
                    <div class="user-boekingen-container">
                        <div class="user-boekingen-box">
                            <?php
                                if ($stmt->rowCount() > 0) {
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<div class='boekingen'>";
                                        echo "<div class='box'>";
                                        echo "<div class='img'>";
                                        echo "<img src='../../img-reisbureau/beach.png' alt='FOTO?'>";
                                        echo "</div>";
                                        echo $row["hotelkamer_naam"];
                                        echo "</div>";
                                        echo "<form action='../cancel.php' method='POST'>";
                                        echo "<input type='hidden' name='gebruiker_id' value='" . $gebruikerId . "'>";
                                        echo "<input type='hidden' name='hotel_kamer_id' value='" . $row["hotel_kamer_id"] . "'>";
                                        echo "<input type='submit' name='cancel' value='Annuleren'>";
                                        echo "</form>";
                                        echo "</div>";

                                        // echo "<p><strong>Gebruiker ID:</strong> " . $row["gebruiker_id"] . "</p>";
                                        // echo "<p><strong>Hotel Kamer ID:</strong> " . $row["hotel_kamer_id"] . "</p>";
                                        // echo "<p><strong>Hotel Kamer Naam:</strong> " . $row["hotelkamer_naam"] . "</p>";
                                        // echo "<hr>";
                                    }
                                } else {
                                    echo "<p>Geen boekingen gevonden.</p>";
                                }
                            ?>
                            <!-- <div class="boekingen">
                                <div class="box">
                                    <div class="img">
                                        <img src="../../img-reisbureau/beach.png" alt="FOTO?">
                                    </div>
                                    <?php
                                    echo $_SESSION['voornaam'];
                                    ?>
                                </div>
                                <form action="../cancel.php">
                                    <input type="submit" name="cancel" value="Annuleren">
                                </form>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include_once("../../footer-2.php"); ?>

</body>

</html>