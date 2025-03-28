<?php
$host = 'localhost';
$db = 'db_digitallibrary';
$user = 'root';
$pass = 'sipa2402';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $stmt = $pdo->query("SELECT 1");
    if ($stmt) {
        // echo "Koneksi berhasil!";
    }
} catch (\PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}

?>