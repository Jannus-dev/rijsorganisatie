<?php
require_once 'admin/conn.php';

// Get input from form into vars
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$stmt = $conn->prepare("SELECT email, wachtwoord, rol, voornaam, achternaam FROM users WHERE email=:email AND wachtwoord=:wachtwoord");
$stmt->execute(['email' => $email, 'wachtwoord' => $wachtwoord]);
$user = $stmt->fetch();

if ($user != false) {
    session_start();
    $_SESSION['email'] = $user['email'];
    $_SESSION['rol'] = $user['rol'];
    $_SESSION['voornaam'] = $user['voornaam'];
    $_SESSION['achternaam'] = $user['achternaam'];

    
    // Na het valideren van de inloggegevens en succesvol inloggen
    $_SESSION['loggedin'] = true;

    header("location: ../index.php");
} else {
    header("location: login.php");
}
?>
