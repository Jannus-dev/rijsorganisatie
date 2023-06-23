<?php
require_once '../admin/conn.php';
// Controleren of het formulier is verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ontvangen gegevens uit het formulier
    $kamerId = $_POST['kamer_id'];
    $kamerNaam = $_POST['kamer_naam'];
    $minPersonen = $_POST['min_personen'];
    $maxPersonen = $_POST['max_personen'];
    $bedden = $_POST['bedden'];
    $prijs = $_POST['prijs'];

    // Query om de hotelkamer bij te werken
    $query = "UPDATE `hotel-kamers` SET naam = :naam, `min-personen` = :min_personen, `max-personen` = :max_personen, bedden = :bedden, prijs = :prijs WHERE id = :kamer_id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':kamer_id', $kamerId);
    $stmt->bindValue(':naam', $kamerNaam);
    $stmt->bindValue(':min_personen', $minPersonen);
    $stmt->bindValue(':max_personen', $maxPersonen);
    $stmt->bindValue(':bedden', $bedden);
    $stmt->bindValue(':prijs', $prijs);
    $stmt->execute();

    // Controleren of de hotelkamer succesvol is bijgewerkt
    if ($stmt->rowCount() > 0) {
        // Hotelkamer is bijgewerkt, omleiden naar een succespagina of andere actie ondernemen
        header("Location: boekingen-onderhoud.php");
        exit();
    } else {
        // Kon de hotelkamer niet bijwerken, omleiden naar een foutpagina of andere actie ondernemen
        header("Location: foutpagina.php");
        exit();
    }
} else {
    // Het formulier is niet verzonden, omleiden naar een foutpagina of andere actie ondernemen
    header("Location: foutpagina.php");
    exit();
}
?>
