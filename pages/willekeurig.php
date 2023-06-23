<?php
session_start();
// Inclusie van het bestand voor de databaseverbinding
require 'admin/conn.php';

// Mapping van continent-id's naar continentnamen
$continenten = array(
    1 => 'Afrika',
    2 => 'Antarctica',
    3 => 'Azië',
    4 => 'Australië',
    5 => 'Europa',
    6 => 'Noord-Amerika',
    7 => 'Zuid-Amerika'
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestemmingen</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/willekeurig.css">
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
                <li>
                    <div class="box">
                        <img src="../img-reisbureau\linkervleugel.png" alt="">
                        <a href="willekeurig.php">Bestemmingen</a>
                        <img src="../img-reisbureau\rechtervleugel.png" alt="">
                    </div>
                </li>
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
        <div class="item-container">
            <div class="nav-box">
                <form action="" method="POST">
                    <nav>
                        <h2>Filter op:</h2>

                        <label>
                            <input type="checkbox" name="options[]" value="all_in">
                            All-Inclusive
                        </label>
                        <label>
                            <input type="checkbox" name="options[]" value="bed_en_breakfast">
                            Bed & Breakfast
                        </label>
                        <label>
                            <input type="checkbox" name="options[]" value="zwembad">
                            Zwembad
                        </label>

                        <!-- <button onclick="filterHotel_ingebgrepen()">Filter</button> -->
                    </nav>
                    <nav>
                        <h2>Filter regio/'s:</h2>
                        <label>
                            <input type="checkbox" name="region[]" value="Europa" checked>
                            Europa
                        </label>
                        <label>
                            <input type="checkbox" name="region[]" value="Noord-Amerika">
                            Noord-Amerika
                        </label>
                        <label>
                            <input type="checkbox" name="region[]" value="Zuid-Amerika">
                            Zuid-Amerika
                        </label>
                        <label>
                            <input type="checkbox" name="region[]" value="Azië">
                            Azië
                        </label>
                        <label>
                            <input type="checkbox" name="region[]" value="Afrika">
                            Afrika
                        </label>
                        <label>
                            <input type="checkbox" name="region[]" value="Australië">
                            Australië
                        </label>
                        <input type="submit" value="Submit">

                        <!-- <button onclick="filterRegion()" onclick="filterHotel_ingebgrepen()">Filter</button> -->
                    </nav>
                </form>

            </div>
            <div class="deals-box">
                <?php
                    // Controleren of het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ontvang de geselecteerde continentnaam uit het formulier
    $selectedContinents = isset($_POST['region']) ? $_POST['region'] : array();

    // Mapping van geselecteerde continentnamen naar continent-id's
    $selectedContinentIds = array();
    foreach ($selectedContinents as $continent) {
        foreach ($continenten as $id => $naam) {
            if ($naam === $continent) {
                $selectedContinentIds[] = $id;
                break;
            }
        }
    }

    // Ontvang de geselecteerde luxe-opties uit het formulier
    $selectedOptions = isset($_POST['options']) ? $_POST['options'] : array();

    // Voorbereiden van de databasequery om hotelkamers op te halen
    $query = "SELECT hk.*, t.text
              FROM `hotel-kamers` hk
              INNER JOIN `hotels` h ON hk.hotel_id = h.id
              INNER JOIN `steden` s ON h.stad_id = s.id
              INNER JOIN `landen` l ON s.land_id = l.id
              INNER JOIN `continent` c ON l.continent_id = c.id
              LEFT JOIN (
                SELECT text
                FROM `textje`
                -- ORDER BY RAND()
                LIMIT 1
              ) t ON 1=1";

    // Controleren of er filters zijn toegepast
    if (!empty($selectedContinentIds) || !empty($selectedOptions)) {
        $query .= " WHERE";

        // Controleren of er geselecteerde continenten zijn
        if (!empty($selectedContinentIds)) {
            $placeholders = implode(',', array_fill(0, count($selectedContinentIds), '?'));
            $query .= " c.id IN (" . $placeholders . ")";
        }

        // Controleren of er geselecteerde luxe-opties zijn
        if (!empty($selectedOptions)) {
            if (!empty($selectedContinentIds)) {
                $query .= " AND";
            }

            $query .= " EXISTS (SELECT 1 FROM `hotel-luxe` hl WHERE hl.hotel_id = h.id";

            // Dynamisch bouwen van de voorwaarden voor de geselecteerde luxe-opties
            foreach ($selectedOptions as $option) {
                $column = ($option === 'all-in') ? 'all-in' : ($option === 'bed_en_breakfast' ? 'bed_en_breakfast' : 'zwembad');
                $query .= " AND hl." . $column . " = 'ja'";
            }

            $query .= ")";
        }
    }

    // Uitvoeren van de query met de juiste parameters
    $stmt = $conn->prepare($query);
    $stmt->execute($selectedContinentIds);

    // Controleren of er hotelkamers zijn gevonden
    if ($stmt->rowCount() > 0) {
        // Weergeven van de resultaten
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo " <div class='deal item'>";
            echo "<div class='img'>";
            echo "<img src='../img-reisbureau/beach.png' alt='foto?'>";
            echo "</div>";
            echo "<div class='whitebox-botom'>";
            echo "<h2>" . $row['naam'] . "</h2>";
            echo "<a href='boek.php?id=" . $row['id'] . "' class='whitebox-link'>»</a>";
            echo "</div>";
            echo "<h3>" . $row['text'] . "</h3>";
            echo "<div class='price-box'>";
            echo "<h2> €" . $row['prijs'] . "</h2>";
            echo "</div>";
            echo "</div>";
            
            // echo "<p><strong>Kamer:</strong> " . $row["id"] . "</p>";
            // echo "<p><strong>Hotel ID:</strong> " . $row["hotel_id"] . "</p>";
            // echo "<p><strong>Naam:</strong> " . $row["naam"] . "</p>";
            // echo "<p><strong>Text:</strong> " . $row["text"] . "</p>";
            // echo "<hr>";
        }
    } else {
        echo "<p>Geen hotelkamers gevonden met de opgegeven filters.</p>";
    }
}
                ?>

                <?php
                // foreach ($data as $row) {
                //     echo " <div class='deal item'>";
                //     // echo "<img class='whitebox-img' src='" . $row['img'] . "' alt='test'>";
                //     echo "<div class='img'>";
                //     echo " <img src='../img-reisbureau/beach.png' alt='foto?'>";
                //     echo "</div>";
                //     // hierboven als img van iets zoals een hotel
                //     echo "<div class='whitebox-botom'>";
                //     echo "<h2>" . $row['land'] . "</h2>";
                //     // hierboven als titel niet random maar van een hotel ofzo
                //     echo "<a href='boek.php?" . $row['id'] . "' class='whitebox-link'>»</a>";
                //     echo "</div>";

                //     // echo "<h3>" . $data_text['text'] . "</h3>";
                    
                //     // hierboven als informatie over product
                
                //     echo "</div>";
                // }
                ?>
            </div>
        </div>

    </div>

    <?php include_once("../footer.php"); ?>
</body>

<script>
// function filterRegion() {
//     var regionRadios = document.getElementsByName("region");
//     var selectedRegion = "";

//     for (var i = 0; i < regionRadios.length; i++) {
//         if (regionRadios[i].checked) {
//             selectedRegion = regionRadios[i].value;
//             break;
//         }
//     }

//     if (selectedRegion !== "") {
//         console.log("Geselecteerde regio: " + selectedRegion);
//     } else {
//         alert("Kies een regio A.U.B.");
//     }
// }

function filterHotel_ingebgrepen() {
    var regionCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    var selectedRegions = [];

    regionCheckboxes.forEach(function(checkbox) {
        selectedRegions.push(checkbox.value);
    });

    if (selectedRegions.length > 0) {
        // Perform any desired operations with the selected regions
        console.log("Selected Regions: " + selectedRegions.join(", "));
    }
    // else {
    //     alert("Please select at least one region.");
    // }
}

function filterRegion() {
    var regionCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    var selectedRegions = [];

    regionCheckboxes.forEach(function(checkbox) {
        selectedRegions.push(checkbox.value);
    });

    if (selectedRegions.length > 0) {
        // Perform any desired operations with the selected regions
        console.log("Geselecteerde regio/'s: " + selectedRegions.join(", "));
    } else {
        alert("Kies een regio A.U.B.");
    }
}
</script>

</html>