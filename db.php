<?php
$servername = "localhost";
$username = "jasperk"; // vervang met jouw DB gebruiker
$password = "jsaperk"; // vervang met jouw DB wachtwoord
$dbname = "jasperk_sklonline"; // jouw database naam

// Maak verbinding met de database
$conn = new mysqli($servername, $username, $password, $dbname);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
