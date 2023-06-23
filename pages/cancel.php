<?php
// Verbinding maken met de database (conn.php)
require_once 'admin/conn.php';

// Controleren of er een POST-verzoek is verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ontvangen van de gebruiker_id en hotel_kamer_id uit het formulier
    $gebruikerId = $_POST['gebruiker_id'];
    $hotelKamerId = $_POST['hotel_kamer_id'];

    // Voorbereiden van de databasequery om boeking te verwijderen
    $query = "DELETE FROM boekingen
              WHERE gebruiker_id = :gebruiker_id AND hotel_kamer_id = :hotel_kamer_id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':gebruiker_id', $gebruikerId, PDO::PARAM_INT);
    $stmt->bindValue(':hotel_kamer_id', $hotelKamerId, PDO::PARAM_INT);

    // Uitvoeren van de query om de boeking te verwijderen
    if ($stmt->execute()) {
        echo "Boeking succesvol geannuleerd.";
        header("location: gebruiker-paginas/boekingen.php");
    } else {
        echo "Er is een fout opgetreden bij het annuleren van de boeking.";
    }
} else {
    echo "Ongeldig verzoek.";
}
?>
