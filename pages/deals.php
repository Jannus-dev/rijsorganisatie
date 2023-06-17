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
        <div class="container">
            <div class="nav">
                <div class="select-region-box">
                    <div class="select-region">
                        <div class="container">
                            <h2>Select a Region</h2>
                            <form>
                                <label>
                                    <input type="radio" name="region" value="Europe">
                                    Europe
                                </label>
                                <label>
                                    <input type="radio" name="region" value="North America">
                                    North America
                                </label>
                                <label>
                                    <input type="radio" name="region" value="South America">
                                    South America
                                </label>
                                <label>
                                    <input type="radio" name="region" value="Asia">
                                    Asia
                                </label>
                                <label>
                                    <input type="radio" name="region" value="Africa">
                                    Africa
                                </label>
                                <label>
                                    <input type="radio" name="region" value="Australia">
                                    Australia
                                </label>
                            </form>
                            <button onclick="filterRegion()">Filter</button>
                        </div>

                        <script>
                            function filterRegion() {
                                var regionRadios = document.getElementsByName("region");
                                var selectedRegion = "";

                                for (var i = 0; i < regionRadios.length; i++) {
                                    if (regionRadios[i].checked) {
                                        selectedRegion = regionRadios[i].value;
                                        break;
                                    }
                                }

                                if (selectedRegion !== "") {
                                    console.log("Geselecteerde regio: " + selectedRegion);
                                } else {
                                    alert("Kies een regio A.U.B.");
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include_once("../footer.php"); ?>
</body>

</html>