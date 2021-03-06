<?php
$servername = 'localhost';
$username   = 'root';
$password   = '';
$db_name    = 'products_crud';

$pdo = new PDO("mysql:host=$servername; port=3306; dbname=$db_name", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare("DELETE FROM products WHERE id = :id");
$statement->bindValue(':id', $id);
$statement->execute();
header('Location: index.php');