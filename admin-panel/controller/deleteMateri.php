<?php
// Mulai sesi dan koneksi ke database
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit();
}

require_once('../koneksi/koneksi-db.php');

// Periksa apakah ada lesson_id yang dikirimkan untuk dihapus
if (isset($_GET['lesson_id'])) {
    $lesson_id = $_GET['lesson_id'];

    // Pastikan lesson_id valid
    if (!is_numeric($lesson_id)) {
        $_SESSION['error'] = "ID materi tidak valid.";
        header("Location: ../admin-materi.php");
        exit();
    }

    // Siapkan query untuk menghapus materi berdasarkan lesson_id
    $sql = "DELETE FROM tbl_materi WHERE lesson_id = ?";

    // Mempersiapkan statement untuk menghindari SQL Injection
    if ($stmt = $conn->prepare($sql)) {
        // Mengikat parameter
        $stmt->bind_param("i", $lesson_id);

        // Mengeksekusi query
        if ($stmt->execute()) {
            // Jika berhasil, alihkan kembali ke halaman materi dengan course_id
            $_SESSION['success'] = "Materi berhasil dihapus.";
            header("Location: ../admin-materi.php?course_id=" . $_GET['course_id']);
            exit();
        } else {
            // Jika gagal, tampilkan pesan error
            $_SESSION['error'] = "Gagal menghapus materi: " . $stmt->error;
        }

        // Menutup statement
        $stmt->close();
    } else {
        // Jika query gagal dipersiapkan, tampilkan pesan error
        $_SESSION['error'] = "Gagal menghubungkan ke database.";
    }

    // Menutup koneksi database
    $conn->close();
} else {
    // Jika lesson_id tidak ada, redirect dengan pesan error
    $_SESSION['error'] = "ID materi tidak ditemukan.";
    header("Location: ../admin-materi.php");
    exit();
}
?>
