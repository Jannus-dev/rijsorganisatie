<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onderhoud</title>
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/gebruiker.css">
    <link rel="stylesheet" href="../../css/onderhoud.css">
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

                        <a href="onderhoud.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/reparatie-icon.png" alt="moer">
                                <p>Onderhoud</p>
                                < </div>
                        </a>

                        <a href="boekingen-toevoegen.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/booking-add.png" alt="boek">
                                <p>Boekingen toevoegen</p>
                            </div>
                        </a>


                        <div class="black-line"></div>
                        </li>
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
                            </div>
                        </a>
                        <a href="../gebruiker-paginas/wachtwoord-veranderen.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/icone-point-d-interrogation-question-jaune.png"
                                    alt="boek">
                                <p>Wachtwoord veranderen</p>
                            </div>
                        </a>
                    </ul>
                </div>
                <div class="nav nav-right">
                <?php
                require_once '../admin/conn.php';
                    // Controleren of er een hotelkamer-id is opgegeven
                    if (isset($_GET['kamer_id'])) {
                        // Het hotelkamer-id ophalen
                        $kamerId = $_GET['kamer_id'];

                        // Query om de informatie van de hotelkamer op te halen
                        $query = "SELECT * FROM `hotel-kamers` WHERE id = :kamer_id";
                        $stmt = $conn->prepare($query);
                        $stmt->bindValue(':kamer_id', $kamerId);
                        $stmt->execute();

                        // Controleren of de hotelkamer bestaat
                        if ($stmt->rowCount() > 0) {
                            // De informatie van de hotelkamer ophalen
                            $kamer = $stmt->fetch(PDO::FETCH_ASSOC);
                        } else {
                            // Hotelkamer niet gevonden, omleiden naar een foutpagina of andere actie ondernemen
                            // header("Location: foutpagina.php");
                            // exit();
                        }
                    } else {
                        // Geen hotelkamer-id opgegeven, omleiden naar een foutpagina of andere actie ondernemen
                        header("Location: foutpagina.php");
                        exit();
                    }
                    ?>

                    <!-- Aanpassingsformulier -->
                    <form name="aanpassen" id="custom_form" action="opslaan-boekingen.php" method="post">
                        <!-- Verborgen veld voor het hotelkamer-id -->
                        <input type="hidden" name="kamer_id" value="<?php echo $kamer['id']; ?>">
                        <input type="hidden" name="hotel_id" value="<?php echo $kamer['hotel_id']; ?>">

                        <!-- Invoervelden voor de hotelkamer informatie -->
                        <label for="kamer_naam">Kamernaam:</label>
                        <input type="text" name="kamer_naam" id="kamer_naam" value="<?php echo $kamer['naam']; ?>" required>

                        <label for="min_personen">Minimale aantal personen:</label>
                        <input type="number" name="min_personen" id="min_personen" value="<?php echo $kamer['min-personen']; ?>" required>

                        <label for="max_personen">Maximale aantal personen:</label>
                        <input type="number" name="max_personen" id="max_personen" value="<?php echo $kamer['max-personen']; ?>" required>

                        <label for="bedden">Aantal bedden:</label>
                        <input type="number" name="bedden" id="bedden" value="<?php echo $kamer['bedden']; ?>" required>

                        <label for="prijs">Prijs per nacht:</label>
                        <input type="number" name="prijs" id="prijs" value="<?php echo $kamer['prijs']; ?>" required>

                        <input type="submit" name="opslaan" value="Opslaan">
                    </form>


                </div>
            </div>
        </div>
    </div>

    <?php include_once("../../footer-2.php");?>

</body>

</html>