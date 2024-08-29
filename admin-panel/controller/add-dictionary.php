<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin-login.php");
    exit();
}

// Load koneksi database
include_once '../koneksi/koneksi-db.php';

// Cek apakah form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $simplified = trim($_POST['simplified']);
    $traditional = trim($_POST['traditional']);
    $pinyin = trim($_POST['pinyin']);
    $english = trim($_POST['english']);
    $indonesian = trim($_POST['indonesian']);

    // Validasi input (contoh dasar)
    if (empty($simplified) || empty($traditional) || empty($pinyin) || empty($english) || empty($indonesian)) {
        die("Semua field harus diisi.");
    }

    // Query untuk menambah data ke database
    $query = "INSERT INTO tbl_dictionary (Simplified, Traditional, Pinyin, English, Indonesian) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("sssss", $simplified, $traditional, $pinyin, $english, $indonesian);

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
