<?php
// Verbinding maken met de database (conn.php)
require_once '../admin/conn.php';

// Controleren of het bewerkingsformulier is ingediend
if (isset($_POST['opslaan'])) {
    // Gebruikersgegevens ophalen uit het formulier
    $gebruikerId = $_POST['gebruiker_id'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];
    $rol = $_POST['rol'];

    // Query om de gebruikersgegevens bij te werken
    $query = "UPDATE users SET voornaam = :voornaam, achternaam = :achternaam, email = :email, wachtwoord = :wachtwoord, rol = :rol WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':voornaam', $voornaam);
    $stmt->bindParam(':achternaam', $achternaam);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':wachtwoord', $wachtwoord);
    $stmt->bindParam(':id', $gebruikerId);
    $stmt->bindParam(':rol', $rol);

    // Uitvoeren van de query om de gegevens bij te werken
    if ($stmt->execute()) {
        echo "Gebruikersgegevens zijn succesvol bijgewerkt.";
        header("location: onderhoud.php");
        // Eventueel andere acties na het bijwerken van de gegevens
    } else {
        echo "Er is een fout opgetreden bij het bijwerken van de gebruikersgegevens.";
    }
} else {
    echo "Het bewerkingsformulier is niet ingediend.";
}
?>
