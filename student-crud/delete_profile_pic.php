<?php
// delete_profile_pic.php
session_start();

header('Content-Type: application/json');

if (!isset($_POST['nim']) || empty($_POST['nim'])) {
    echo json_encode(['status' => 'error', 'message' => 'NIM is required.']);
    exit();
}

$nim = $_POST['nim'];

require_once 'koneksi.php'; // Pastikan file koneksi.php Anda sudah benar

$response = ['status' => 'error', 'message' => 'Unknown error.'];

try {
    // 1. Ambil jalur gambar yang akan dihapus dari database
    $stmt = $pdo->prepare("SELECT profile_pic FROM mahasiswa WHERE nim = :nim");
    $stmt->execute([':nim' => $nim]);
    $result = $stmt->fetch();
    $currentProfilePicPath = null;
    if ($result && !empty($result['profile_pic'])) {
        $currentProfilePicPath = $result['profile_pic'];
    }

    // 2. Hapus jalur dari database
    $stmt = $pdo->prepare("UPDATE mahasiswa SET profile_pic = NULL WHERE nim = :nim"); // Setel ke NULL
    $stmt->execute([':nim' => $nim]);

    if ($stmt->rowCount() > 0) {
        // 3. Jika update database berhasil, hapus file fisik di server
        if ($currentProfilePicPath && file_exists($currentProfilePicPath)) {
            unlink($currentProfilePicPath);
            error_log("Profile picture deleted from server: " . $currentProfilePicPath);
        }
        $response = ['status' => 'success', 'message' => 'Foto profil berhasil dihapus.'];
    } else {
        $response = ['status' => 'error', 'message' => 'Gagal menghapus foto profil: NIM tidak ditemukan atau foto sudah kosong.'];
    }

} catch (PDOException $e) {
    error_log("Database error in delete_profile_pic.php: " . $e->getMessage());
    $response = ['status' => 'error', 'message' => 'Terjadi kesalahan database saat menghapus foto profil. Silakan cek log server.'];
}

echo json_encode($response);
?>