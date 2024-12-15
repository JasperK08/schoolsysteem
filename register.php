<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // 'student' of 'teacher'

    // Hash het wachtwoord
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Invoegen in de database
    $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "Registratie succesvol!";
    } else {
        echo "Fout bij registratie: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Registreren</h1>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="Naam" required>
        <input type="email" name="email" placeholder="E-mailadres" required>
        <input type="password" name="password" placeholder="Wachtwoord" required>
        <select name="role" required>
            <option value="student">Student</option>
            <option value="teacher">Docent</option>
        </select>
        <button type="submit">Registreren</button>
    </form>
</body>
</html>
