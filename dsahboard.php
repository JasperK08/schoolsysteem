<?php
session_start();
include 'db.php';

// Controleer of de gebruiker is ingelogd en rol is docent
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header('Location: login.php');
    exit();
}

// Hier kun je functionaliteit toevoegen voor docenten om gegevens in te voeren

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docent Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Docent Dashboard</h1>
    <nav>
        <a href="view.php">Bekijk Rooster en Cijfers</a>
        <a href="logout.php">Uitloggen</a>
    </nav>
    <h2>Voeg lessen, cijfers of aanwezigheid toe:</h2>
    <!-- Formulieren voor invoer van lessen, cijfers, en aanwezigheid -->
</body>
</html>
