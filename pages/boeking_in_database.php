<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['gebruiker_id'])) {
    // Gebruiker is niet ingelogd, doorsturen naar de inlogpagina
    header("Location: login.php");
    exit;
}

// Controleer of de kamer-ID is doorgegeven via de querystring
if (!isset($_GET['kamer_id'])) {
    // Kamer-ID is niet opgegeven, doorsturen naar een foutpagina of andere geschikte actie
    // bijvoorbeeld: header("Location: foutpagina.php");
    exit;
}

// Inclusie van het bestand voor de databaseverbinding
require_once 'admin/conn.php';

// Ontvang de gebruikers-ID en kamer-ID
$gebruikerId = $_SESSION['gebruiker_id'];
$kamerId = (int)$_GET['kamer_id'];

$data = [
    'gebruiker_id' => $gebruikerId,
    'hotel_kamer_id' => $kamerId
];

    $sql = "INSERT INTO boekingen (gebruiker_id, hotel_kamer_id) VALUES (:gebruiker_id, :hotel_kamer_id )";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    header("Location: gebruiker-paginas/boekingen.php");
?>
