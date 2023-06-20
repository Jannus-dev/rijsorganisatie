<?php
require_once 'pages/admin/conn.php';
$stmt = $conn->prepare("SELECT * FROM landen ORDER BY RAND()
    LIMIT 8");
$stmt->execute();
$data = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Laila:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background">
        <header>
            <div class="logo">
                <a href="index.php">
                    <img src="img-reisbureau\main-logo.jpg" alt="Logo">
                </a>
            </div>
            <ul>
                <li><a href="pages/bestemmingen.php">Bestemmingen</a></li>
                <li><a href="pages/willekeurig.php">Willekeurig</a></li>
                <li><a href="pages/deals.php">Deals</a></li>
                <li><a href="pages/login.php">Login</a></li>
            </ul>
        </header>
        <nav>
            <h1>Top Landen</h1>
        </nav>

        <div class="box">
            <div class="voorgestelde-lijst">
                <section>
                    <?php
                            foreach ($data as $row) {
                                echo "<div class='whitebox'>";
                                echo "<img class='whitebox-img' src='" . $row['img'] . "' alt='test'>";
                                echo "<div class='whitebox-botom'>";
                                echo "<h3>" . $row['land'] . "</h3>";
                                echo "<a href='pages/bestemmingen.php?" . $row['id'] . "' class='whitebox-link'>»</a>";
                                echo "</div>";
                                echo "</div>";
                            }

                        ?>
                </section>
            </div>
        </div>

    </div>
    <footer>
    <a href="pages/footerpage/algemene-voorwaarden.php">Algemene voorwaarden</a>
    <a href="pages/footerpage/privacy-policy.php"> Privacy policy</a>
    <a href="pages/footerpage/contact.php">Contact</a>
    <a href="pages/footerpage/onsbedrijf.php">Ons Bedrijf</a>
</footer>

</body>

</html>