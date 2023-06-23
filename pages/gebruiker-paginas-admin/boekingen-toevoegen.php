<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boeking toevoegen</title>
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
                            </div>
                        </a>

                        <a href="boekingen-toevoegen.php">
                            <div class="icon">
                                <img src="../../img-reisbureau/booking-add.png" alt="boek">
                                <p>Boekingen toevoegen</p>
                                < </div>
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
                    // Verbinding maken met de database (conn.php)
                    require_once '../admin/conn.php';

                    // Controleren of het toevoegingsformulier is ingediend
                    if (isset($_POST['toevoegen'])) {
                        // Gegevens ophalen uit het formulier
                        $data = [
                            'hotel_id' => $_POST['hotel'],
                            'naam' => $_POST['kamer_naam'], 
                            'min_personen' => $_POST['min-personen'],
                            'max_personen' => $_POST['max-personen'],
                            'bedden' => $_POST['bedden'],
                            'prijs' => $_POST['prijs'],
                        ];
                        var_dump($data);

                        // Query om de hotelkamer toe te voegen
                        $query = "INSERT INTO `hotel-kamers` (hotel_id, naam, `min-personen`, `max-personen`, bedden, prijs) VALUES 
                            (:hotel_id, :naam, :min_personen, :max_personen, :bedden, :prijs)";
                        $stmt = $conn->prepare($query);
                       
                        // Uitvoeren van de query om de hotelkamer toe te voegen
                        if ($stmt->execute($data)) {
                            echo "Hotelkamer is succesvol toegevoegd.";
                            // Eventueel andere acties na het toevoegen van de hotelkamer
                        } else {
                            echo "Er is een fout opgetreden bij het toevoegen van de hotelkamer.";
                        }
                    }
                    ?>

                    <!-- Toevoegingsformulier -->
                    <form id="custom_form" name="toevoegen" action="boekingen-toevoegen.php" method="POST">
                        <!-- Selectie van het hotel -->
                        <label for="hotel">Selecteer een hotel:</label>
                        <select name="hotel" id="hotel" required>
                            <!-- Opties voor de hotels -->
                            <!-- Hier kun je de hotels uit de database ophalen en in de selectie plaatsen -->
                            <!-- Bijvoorbeeld: -->
                            <?php
                            $query = "SELECT * FROM hotels";
                            $stmt = $conn->query($query);
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['hotel'] . "</option>";
                            }
                            ?>
                        </select>

                        <!-- Invoervelden voor de hotelkamer informatie -->
                        <label for="kamer_naam">Kamernaam:</label>
                        <input type="text" name="kamer_naam" id="kamer_naam" placeholder="Naam Kamer" required>

                        <label for="min-personen">Minimale aantal personen:</label>
                        <input type="number" name="min-personen" id="min-personen" placeholder="1" required>

                        <label for="max_personen">Maximale aantal personen:</label>
                        <input type="number" name="max-personen" id="max-personen" placeholder="1" required>

                        <label for="bedden">Aantal bedden:</label>
                        <input type="number" name="bedden" id="bedden" placeholder="1" required>

                        <label for="prijs">Prijs per nacht:</label>
                        <input type="number" name="prijs" id="prijs" placeholder="100" required>

                        <input type="submit" name="toevoegen" value="Toevoegen">
                    </form>


                </div>
            </div>
        </div>
    </div>

    <?php include_once("../../footer-2.php");?>

</body>

</html>