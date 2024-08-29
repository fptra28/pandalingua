<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin-login.php");
    exit();
}

// Load koneksi database
include_once '../koneksi/koneksi-db.php';

// Cek jika form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id = intval($_POST['id']);
    $simplified = trim($_POST['simplified']);
    $traditional = trim($_POST['traditional']);
    $pinyin = trim($_POST['pinyin']);
    $english = trim($_POST['english']);
    $indonesian = trim($_POST['indonesian']);

    // Validasi input
    if (empty($simplified) || empty($traditional) || empty($pinyin) || empty($english) || empty($indonesian)) {
        die("Semua field harus diisi.");
    }

    // Query untuk memperbarui data di database
    $query = "UPDATE tbl_dictionary SET Simplified = ?, Traditional = ?, Pinyin = ?, English = ?, Indonesian = ? WHERE id = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("sssssi", $simplified, $traditional, $pinyin, $english, $indonesian, $id);

        if ($stmt->execute()) {
            header("Location:../admin-Dictionary.php");
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }

        $stmt->close();
    } else {
        die("Query preparation failed: " . $conn->error);
    }
}

// Tutup koneksi
$conn->close();
?>
