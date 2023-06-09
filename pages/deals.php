<?php
require_once 'admin/conn.php';

// Query voor het ophalen van gegevens uit de eerste tabel
$query1 = "SELECT land FROM landen";
$stmt1 = $conn->query($query1);
$results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

// Query voor het ophalen van gegevens uit de tweede tabel
$query2 = "SELECT column3, column4 FROM table2";
$stmt2 = $conn->query($query2);
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);


$stmt = $conn->prepare("SELECT * FROM landen ORDER BY RAND()
    LIMIT 20");
$stmt->execute();
$data = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deals</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/deals.css">

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
                <li>
                    <div class="box">
                        <img src="../img-reisbureau\linkervleugel.png" alt="">
                        <a href="deals.php">Deals</a>
                        <img src="../img-reisbureau\rechtervleugel.png" alt="">
                    </div>
                </li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </header>
        <div class="item-container">
            <nav>
                <h2>Filter regio/'s:</h2>
                <form>
                    <label>
                        <input type="checkbox" name="region" value="Europe">
                        Europa
                    </label>
                    <label>
                        <input type="checkbox" name="region" value="North America">
                        Noord-Amerika
                    </label>
                    <label>
                        <input type="checkbox" name="region" value="South America">
                        Zuid-Amerika
                    </label>
                    <label>
                        <input type="checkbox" name="region" value="Asia">
                        Azië
                    </label>
                    <label>
                        <input type="checkbox" name="region" value="Africa">
                        Afrika
                    </label>
                    <label>
                        <input type="checkbox" name="region" value="Australia">
                        Australië
                    </label>

                </form>
                <button onclick="filterRegion()">Filter</button>
            </nav>
            <div class="deals-box">
                <?php
                foreach ($data as $row) {
                    echo " <div class='deal item'>";
                    // echo "<img class='whitebox-img' src='" . $row['img'] . "' alt='test'>";
                    echo "<div class='img'>";
                    echo " <img src='../img-reisbureau/beach.png' alt='foto?'>";
                    echo "</div>";
                    // hierboven als img van iets zoals een hotel
                    echo "<div class='whitebox-botom'>";
                    echo "<h2>" . $row['land'] . "</h2>";
                    // hierboven als titel niet random maar van een hotel ofzo
                    echo "<a href='boek.php?" . $row['id'] . "' class='whitebox-link'>»</a>";
                    echo "</div>";
                    echo "<h3>" . $data_text['text'] . "</h3>";
                    // hierboven als informatie over product
                    echo "<div class='price-box'>";
                    echo "<h1 class='old-price'>12€</h1>";
                    // hierboven als oude prijs vanuit DB
                    echo "<h1 class='new-price'>9€</h1>";
                    // hierboven als oude prijs -25%
                    // GOED LEZEN
                    echo "</div>";
                    echo "</div>";
                }
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