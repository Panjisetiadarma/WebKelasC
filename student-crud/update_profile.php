<?php
// update_profil.php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo json_encode(["status" => "error", "message" => "Tidak terautentikasi. Silakan login kembali."]);
    exit();
}

// Konfigurasi Koneksi Database
$servername = "localhost";
$username_db = "root";   // Sesuaikan
$password_db = "";       // Sesuaikan
$dbname = "mahasiswa"; // Nama database yang berisi tabel 'mahasiswa'

$koneksi = new mysqli($servername, $username_db, $password_db, $dbname);

if ($koneksi->connect_error) {
    echo json_encode(["status" => "error", "message" => "Koneksi database gagal."]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari POST request
    $nim = $koneksi->real_escape_string($_POST['nim']); // NIM yang sedang diedit
    // Pastikan hanya NIM yang sedang login yang boleh mengupdate profilnya
    if ($nim !== $_SESSION['nim']) {
        echo json_encode(["status" => "error", "message" => "Akses ditolak. NIM tidak sesuai sesi."]);
        exit();
    }

    $nama = $koneksi->real_escape_string($_POST['nama']);
    $ttl = $koneksi->real_escape_string($_POST['ttl']);
    $bio = $koneksi->real_escape_string($_POST['bio']);
    $instagram = $koneksi->real_escape_string($_POST['instagram']);
    $github = $koneksi->real_escape_string($_POST['github']);
    $linkedin = $koneksi->real_escape_string($_POST['linkedin']);
    $portfolio = $koneksi->real_escape_string($_POST['portfolio']);
    $profile_pic = isset($_FILES['profile_pic']) ? $_FILES['profile_pic'] : null;

    // Query UPDATE menggunakan Prepared Statements untuk keamanan
    $stmt = $koneksi->prepare("UPDATE mahasiswa SET nama = ?, ttl = ?, bio = ?, instagram = ?, github = ?, linkedin = ?, portfolio = ? WHERE nim = ?");
    $stmt->bind_param("ssssssss", $nama, $ttl, $bio, $instagram, $github, $linkedin, $portfolio, $nim);

    if ($stmt->execute()) {
        // Jika update berhasil, kembalikan data terbaru (opsional, bisa juga hanya pesan sukses)
        $stmt_select = $koneksi->prepare("SELECT nim, nama, ttl, bio, instagram, github, linkedin, portfolio FROM mahasiswa WHERE nim = ?");
        $stmt_select->bind_param("s", $nim);
        $stmt_select->execute();
        $result_select = $stmt_select->get_result();
        $updated_data = $result_select->fetch_assoc();

        echo json_encode(["status" => "success", "message" => "Profil berhasil diperbarui!", "data" => $updated_data]);
    } else {
        echo json_encode(["status" => "error", "message" => "Gagal memperbarui profil: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Metode request tidak valid."]);
}

$koneksi->close();
?>