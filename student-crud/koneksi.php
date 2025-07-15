<?php
// koneksi.php
$host = 'localhost'; // Atau IP database Anda
$db   = 'anomali'; // Ganti dengan nama database yang benar
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Jangan tampilkan detail error ke frontend di produksi
    // error_log("Database connection error: " . $e->getMessage()); // Catat ke log
    die("Koneksi database gagal: " . $e->getMessage()); // Untuk debugging lokal sementara
}
?>