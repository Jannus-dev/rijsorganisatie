<?php 
require_once "admin/conn.php";
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
    <link rel="stylesheet" href="../css/bestemmingen.css">
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
                        <a href="bestemmingen.php">Bestemmingen</a>
                        <img src="../img-reisbureau\rechtervleugel.png" alt="">
                    </div>
                </li>
                <li><a href="vakantie.php">Vakantie</a></li>
                <li><a href="willekeurig.php">Willekeurig</a></li>
                <li><a href="deals.php">Deals</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </header>
        <div class="datum-box">
            <input class="datum begin" type="date" onfocus="this.showPicker()" id="departureDate" name="departureDate"
                required />
            <input class="datum eind" type="date" onfocus="this.showPicker()" id="returnDate" name="returnDate"
                required />
        </div>
        <!-- <nav>
            <div class="container">
                <div class="filler"></div>
                <p>Voorgestelde vakanties</p>
                <div class="filter">
                    <img src="../img-reisbureau/Filter-Icon.png" alt="">
                </div>
            </div> -->
        </nav>
    </div>

    <?php include_once("../footer.php");?>

</body>

</html>