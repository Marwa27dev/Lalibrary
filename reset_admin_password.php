<?php
require_once 'config.php';

$email = 'jesuis@admin.com';
$password = 'admin123';
$hash = password_hash($password, PASSWORD_BCRYPT);

$stmt = $cnx->prepare("UPDATE users SET pwd = ? WHERE email = ? AND role_ = 'admin'");
$stmt->execute([$hash, $email]);

echo "Admin password reset.";
?>
