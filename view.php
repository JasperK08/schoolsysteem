<?php
session_start();
include 'https://github.com/JasperK08/schoolsysteem/blob/main/db.php';

// Controleer of de gebruiker is ingelogd en rol is student
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header('Location: https://github.com/JasperK08/schoolsysteem/blob/main/login.php');
    exit();
}

// Haal cijfers en rooster op
$sql_grades = "SELECT lessons.name AS lesson_name, grades.grade 
               FROM grades 
               JOIN lessons ON grades.lesson_id = lessons.id 
               WHERE student_id = ".$_SESSION['user_id'];
$result_grades = $conn->query($sql_grades);

$sql_schedule = "SELECT lessons.name AS lesson_name, schedule.day, schedule.time 
                 FROM schedule 
                 JOIN lessons ON schedule.lesson_id = lessons.id";
$result_schedule = $conn->query($sql_schedule);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://github.com/JasperK08/schoolsysteem/blob/main/style.css">
</head>
<body>
    <h1>Student Dashboard</h1>
    <h2>Je Cijfers</h2>
    <table>
        <tr>
            <th>Les</th>
            <th>Cijfer</th>
        </tr>
        <?php while ($row = $result_grades->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['lesson_name']; ?></td>
                <td><?php echo $row['grade']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    
    <h2>Je Rooster</h2>
    <table>
        <tr>
            <th>Les</th>
            <th>Dag</th>
            <th>Tijd</th>
        </tr>
        <?php while ($row = $result_schedule->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['lesson_name']; ?></td>
                <td><?php echo $row['day']; ?></td>
                <td><?php echo $row['time']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    
    <nav>
        <a href="https://github.com/JasperK08/schoolsysteem/blob/main/logout.php">Uitloggen</a>
    </nav>
</body>
</html
