<?php
//------------------------------------------------------------------------
//------------------Test Base de donnée +1 Users--------------------------
//------------------------------------------------------------------------
require_once 'C:/YNOV/PHP/Partiel_20_03/function/db.php';

$pdo = getPdo();

$query = 'INSERT INTO users (login, email, password, active) VALUES (:name, :email, :pass, :is_active)';
$stmt = $pdo->prepare($query);

$insert = $stmt->execute([
    'name' => "Paul",
    'email' => "paul@gmail.com",
    'pass' => password_hash("randompassword", PASSWORD_BCRYPT, ['cost' => 12]),//
    'active' => 1
]);

echo ($insert) ? "Insertion OK" : "Insertion échouée";