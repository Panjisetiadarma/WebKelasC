<?php
// simpan_komentar.php

// --- PENTING UNTUK DEBUGGING ---
error_reporting(E_ALL);
ini_set('display_errors', 1);
// ---------------------------------

$servername = "localhost";
$username = "root";        // Cek lagi: apakah ini user database Anda?
$password = "";            // Cek lagi: apakah ini password database Anda? (sering kosong)
$dbname = "anomali"; // Cek lagi: apakah ini nama database Anda yang benar?

$koneksi = new mysqli($servername, $username, $password, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $komentar = $koneksi->real_escape_string($_POST['komentar']);
    $tanggal = date("Y-m-d H:i:s");

    $sql = "INSERT INTO komentar_forum (nama, komentar, tanggal) VALUES ('$nama', '$komentar', '$tanggal')";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect jika berhasil
        exit();
    } else {
        echo "Error saat menyimpan komentar: " . $sql . "<br>" . $koneksi->error; // Tampilkan error SQL
    }
} else {
    echo "Metode request tidak valid. Silakan gunakan form untuk mengirim komentar.";
}

$koneksi->close();
?>