<?php
require 'db.php';
//This forecast.php sends crop data to the AI module and stores the results.
session_start();

$user_id = $_SESSION['user_id'];
$crop_name = $_POST['crop_name'];
$temperature = $_POST['temperature'];
$rainfall = $_POST['rainfall'];

$data = json_encode([
    'temperature' => $temperature,
    'rainfall' => $rainfall
]);

$ch = curl_init('http://localhost:5000/predict');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$predicted_yield = $result['predicted_yield'];

$stmt = $pdo->prepare("INSERT INTO crop_records (user_id, crop_name, temperature, rainfall, predicted_yield) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$user_id, $crop_name, $temperature, $rainfall, $predicted_yield]);

echo "Predicted Yield: " . $predicted_yield . " tons";
?>
