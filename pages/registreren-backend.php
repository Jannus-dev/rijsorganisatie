<?php
// Verbinding maken met de database (conn.php)
require_once 'admin/conn.php';

// Controleren of er een POST-verzoek is verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ontvangen van de ingevulde gegevens uit het formulier
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];


    // Voorbereiden van de databasequery om nieuwe gebruiker toe te voegen
    $query = "INSERT INTO users (voornaam, achternaam, email, wachtwoord)
              VALUES (:voornaam, :achternaam, :email, :wachtwoord)";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':voornaam', $voornaam, PDO::PARAM_STR);
    $stmt->bindValue(':achternaam', $achternaam, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':wachtwoord', $wachtwoord, PDO::PARAM_STR);

    // Uitvoeren van de query om nieuwe gebruiker toe te voegen
    if ($stmt->execute()) {
        echo "Registratie succesvol voltooid.";
        header("location: login.php");
    } else {
        echo "Er is een fout opgetreden bij de registratie.";
    }
} else {
    echo "Ongeldig verzoek.";
}
?>
