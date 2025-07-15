<?php
// get_mahasiswa.php

// Aktifkan pelaporan error untuk debugging (penting saat pengembangan)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Konfigurasi Koneksi Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anomali";

// Membuat koneksi ke database
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($koneksi->connect_error) {
    // Jika koneksi gagal, kirim respons JSON dengan status error
    header('Content-Type: application/json');
    http_response_code(500); // Kode status HTTP: Internal Server Error
    echo json_encode(["error" => "Koneksi database gagal: " . $koneksi->connect_error]);
    exit();
}

// Query untuk mengambil semua data mahasiswa dari tabel 'mahasiswa'
// Sesuaikan 'nama' dengan nama kolom di database Anda jika berbeda
$sql = "SELECT nim, nama, ttl, bio, instagram, github, linkedin, portfolio FROM mahasiswa ORDER BY nama ASC";
$result = $koneksi->query($sql);

$mahasiswa_array = [];
if ($result->num_rows > 0) {
    // Loop melalui setiap baris hasil dan tambahkan ke array
    while($row = $result->fetch_assoc()) {
        $mahasiswa_array[] = $row;
    }
}

// Tutup koneksi database
$koneksi->close();

// Set header Content-Type agar browser tahu ini adalah JSON
header('Content-Type: application/json');
// Encode array PHP menjadi string JSON dan cetak
echo json_encode($mahasiswa_array);
?>