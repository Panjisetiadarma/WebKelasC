<?php
//  proses_login.php

// Aktifkan pelaporan error untuk debugging (HANYA saat pengembangan)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mulai sesi PHP
session_start();

// Konfigurasi Koneksi Database
$servername = "localhost";
$username_db = "root";   // Sesuaikan dengan username database Anda
$password_db = "";       // Sesuaikan dengan password database Anda
$dbname = "anomali"; // Nama database yang berisi tabel 'mahasiswa'

$koneksi = new mysqli($servername, $username_db, $password_db, $dbname);

// Periksa koneksi database
if ($koneksi->connect_error) {
    echo json_encode(["status" => "error", "message" => "Koneksi database gagal."]);
    exit();
}

// Periksa jika request datang dari metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari input form login
    $nim = $koneksi->real_escape_string($_POST['nim']);
    $password_input = $koneksi->real_escape_string($_POST['password']);

    // Query untuk mencari mahasiswa berdasarkan NIM
    // Saya sarankan menggunakan prepared statement untuk keamanan yang lebih baik
    $stmt = $koneksi->prepare("SELECT nim, nama, password FROM mahasiswa WHERE nim = ?");
    $stmt->bind_param("s", $nim);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $mahasiswa = $result->fetch_assoc();
        
        // Verifikasi password
        // CATATAN PENTING: Jika password di database disimpan sebagai teks biasa 'anomali',
        // maka perbandingannya langsung saja. Namun, ini TIDAK AMAN.
        // Jika Anda menggunakan hashing (misal password_hash() di PHP atau PASSWORD() di MySQL),
        // maka Anda harus menggunakan password_verify() di sini.
        // Contoh: if (password_verify($password_input, $mahasiswa['password']))
        
        if ($password_input === $mahasiswa['password']) { // Perbandingan langsung karena Anda set 'anomali'
            // Login berhasil
            $_SESSION['logged_in'] = true;
            $_SESSION['nim'] = $mahasiswa['nim'];
            $_SESSION['nama'] = $mahasiswa['nama']; // Simpan nama jika perlu
            
            // Mengambil semua data profil mahasiswa untuk dikirim ke frontend
            $stmt_profil = $koneksi->prepare("SELECT nim, nama, ttl, bio, instagram, github, linkedin, portfolio FROM mahasiswa WHERE nim = ?");
            $stmt_profil->bind_param("s", $nim);
            $stmt_profil->execute();
            $result_profil = $stmt_profil->get_result();
            $data_profil = $result_profil->fetch_assoc();

            echo json_encode(["status" => "success", "message" => "Login berhasil!", "data" => $data_profil]);
        } else {
            // Password salah
            echo json_encode(["status" => "error", "message" => "NIM atau password salah."]);
        }
    } else {
        // NIM tidak ditemukan
        echo json_encode(["status" => "error", "message" => "NIM atau password salah."]);
    }

    $stmt->close();
} else {
    // Jika diakses tanpa metode POST
    echo json_encode(["status" => "error", "message" => "Metode request tidak valid."]);
}

$koneksi->close();
exit();
?>