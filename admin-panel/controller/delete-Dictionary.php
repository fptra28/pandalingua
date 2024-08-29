<?php
session_start();

// Redirect jika tidak login
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin-login.php");
    exit();
}

// Load koneksi database
include_once '../koneksi/koneksi-db.php';

// Cek jika id dictionary ada di URL
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);

// Query untuk menghapus data dictionary berdasarkan ID
$query = "DELETE FROM tbl_dictionary WHERE id = ?";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../admin-Dictionary.php?message=deleted");
    } else {
        die("Terjadi kesalahan: " . $stmt->error);
    }

    $stmt->close();
} else {
    die("Query preparation failed: " . $conn->error);
}

// Tutup koneksi
$conn->close();
?>
