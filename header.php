<?php
    session_start();
?>
<div class="background">
    <header>
        <nav>
            <a href="index.php">
                <img src="img reisbureau\main-logo.jpg" alt="Logo">
            </a>
            <a href="pages/bestemmingen.php">Bestemmingen</a>
            <a href="vakantie.php">Vakantie</a>
            <a href="Willekeurig.php">Willekeurig</a>
            <a href="Deals.php">Deals</a>
            <a href="Ons-Bedrijf.php">Ons Bedrijf</a>
            <?php
            // Controleer of de gebruiker is ingelogd
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                // Gebruiker is ingelogd, toon de knop 'Gebruiker'
                echo '<a href="pages/gebruiker.php">Gebruiker</a>';
            } else {
                // Gebruiker is niet ingelogd, toon de knop 'Inloggen'
                echo '<a href="pages/inlog.php">Login</a>';
            }
            ?>
        </nav>
    </header>
</div>

