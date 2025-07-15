<?php
session_start();

header('Content-Type: application/json');

if (!isset($_POST['nim']) || empty($_POST['nim'])) {
    echo json_encode(['status' => 'error', 'message' => 'NIM is required.']);
    exit();
}

$nim = $_POST['nim'];

$uploadDir = 'uploads/profile_pics/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

require_once 'koneksi.php'; // Pastikan file koneksi.php Anda sudah benar

$response = ['status' => 'error', 'message' => 'Unknown error.'];

// --- START: Ambil jalur gambar lama sebelum update ---
$oldProfilePicPath = null;
try {
    $stmt = $pdo->prepare("SELECT profile_pic FROM mahasiswa WHERE nim = :nim");
    $stmt->execute([':nim' => $nim]);
    $result = $stmt->fetch();
    if ($result && !empty($result['profile_pic'])) {
        $oldProfilePicPath = $result['profile_pic'];
    }
} catch (PDOException $e) {
    error_log("Database error fetching old profile pic: " . $e->getMessage());
    // Lanjutkan proses meskipun gagal mendapatkan gambar lama, agar unggah baru tetap bisa dilakukan
}
// --- END: Ambil jalur gambar lama sebelum update ---

if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['profile_pic']['tmp_name'];
    $fileName = $_FILES['profile_pic']['name'];
    $fileSize = $_FILES['profile_pic']['size'];
    $fileType = $_FILES['profile_pic']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $destPath = $uploadDir . $newFileName;

    $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg'];

    if (in_array($fileExtension, $allowedfileExtensions)) {
        if ($fileSize < 5000000) { // Max file size 5MB
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                try {
                    $stmt = $pdo->prepare("UPDATE mahasiswa SET profile_pic = :profile_pic WHERE nim = :nim");
                    $stmt->execute([':profile_pic' => $destPath, ':nim' => $nim]);

                    if ($stmt->rowCount() > 0) {
                        // --- START: Hapus gambar lama setelah update berhasil ---
                        if ($oldProfilePicPath && file_exists($oldProfilePicPath) && $oldProfilePicPath !== $destPath) {
                            unlink($oldProfilePicPath); // Hapus file lama
                            error_log("Old profile picture deleted: " . $oldProfilePicPath); // Untuk debugging
                        }
                        // --- END: Hapus gambar lama ---

                        $response = [
                            'status' => 'success',
                            'message' => 'Foto profil berhasil diunggah dan diperbarui.',
                            'profile_pic_url' => $destPath
                        ];
                    } else {
                        // Jika tidak ada baris yang terpengaruh, mungkin NIM tidak ditemukan
                        // Atau tidak ada perubahan pada kolom profile_pic (jarang terjadi karena nama file baru)
                        $response = ['status' => 'error', 'message' => 'Gagal memperbarui foto profil: NIM tidak ditemukan atau tidak ada perubahan.'];
                    }
                } catch (PDOException $e) {
                    error_log("Database error in upload_profile_pic.php: " . $e->getMessage());
                    // Jika update DB gagal, hapus file yang baru saja diunggah agar tidak ada sampah
                    if (file_exists($destPath)) {
                        unlink($destPath);
                    }
                    $response = ['status' => 'error', 'message' => 'Gagal memperbarui database foto profil. Silakan cek log server.'];
                }
            } else {
                $response = ['status' => 'error', 'message' => 'Gagal memindahkan file yang diunggah.'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Ukuran file melebihi batas (5MB).'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Tipe file tidak valid. Hanya JPG, JPEG, PNG, GIF yang diizinkan.'];
    }
} else {
    // Ini adalah respons jika tidak ada file yang diunggah atau ada kesalahan upload awal
    $response = ['status' => 'error', 'message' => 'Tidak ada file yang diunggah atau terjadi kesalahan upload.'];
}

echo json_encode($response);
?>