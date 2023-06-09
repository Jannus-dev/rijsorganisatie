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
                <li><a href="pages/vakantie.php">Vakantie</a></li>
                <li><a href="pages/willekeurig.php">Willekeurig</a></li>
                <li><a href="pages/deals.php">Deals</a></li>
                <li><a href="pages/login.php">Login</a></li>
            </ul>
        </header>
        <nav>
            <div class="container">
                <div class="filler"></div>
                <p>Voorgestelde vakanties</p>
                <div class="filter">
                    <img src="img-reisbureau/Filter-Icon.png" alt="">
                </div>
            </div>
        </nav>

        <div class="box">
            <ul class="voorgestelde-lijst">
                <section>
                    <li>
                        <div class="whitebox"></div>
                    </li>
                    <li>
                        <div class="whitebox"></div>
                    </li>
                    <li>
                        <div class="whitebox"></div>
                    </li>
                    <li>
                        <div class="whitebox"></div>
                    </li>
                    <li>
                        <div class="whitebox"></div>
                    </li>
                    <li>
                        <div class="whitebox"></div>
                    </li>
                    <li>
                        <div class="whitebox"></div>
                    </li>
                    <li>
                        <div class="whitebox">
                            <p>hello?</p>
                        </div>
                    </li>
                </section>
            </ul>
        </div>

    </div>
    <?php include_once("footer.php");?>

</body>

</html>