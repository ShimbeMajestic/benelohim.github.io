<?php
//Allows farmers to input crop data and see the forecast.
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - AgriConnect</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to AgriConnect!</h1>
    <form action="forecast.php" method="POST" class="form-container">
        <h2>Enter Crop Data</h2>
        <input type="text" name="crop_name" placeholder="Crop Name" required>
        <input type="number" name="temperature" placeholder="Temperature (°C)" required>
        <input type="number" name="rainfall" placeholder="Rainfall (mm)" required>
        <button type="submit">Get Forecast</button>
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>
