<?php
require_once 'conn.php'; // Inclusie van het bestand met de databaseverbinding

$input = $_GET['input'];

// Bouw de query op en voer deze uit met PDO
$query = "SELECT * FROM jouw_tabelnaam WHERE kolomnaam LIKE :input";
$stmt = $conn->prepare($query);
$stmt->bindValue(':input', $input . '%');
$stmt->execute();

// Verzamel de resultaten in een array
$matches = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

// Stuur de resultaten terug als JSON
echo json_encode($matches);
?>

