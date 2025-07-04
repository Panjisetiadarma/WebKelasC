<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "komentar_forum");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$nama = htmlspecialchars($_POST['nama']);
$komentar = htmlspecialchars($_POST['komentar']);

// Simpan ke database
$sql = "INSERT INTO komentar_forum (nama, komentar) VALUES ('$nama', '$komentar')";
if ($koneksi->query($sql) === TRUE) {
    header("Location: forum.php"); // redirect kembali ke forum
} else {
    echo "Gagal menyimpan komentar: " . $koneksi->error;
}

$koneksi->close();
?>
