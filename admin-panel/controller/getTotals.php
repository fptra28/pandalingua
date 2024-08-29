<?php
// Koneksi ke database
require_once './koneksi/koneksi-db.php';

// Fungsi untuk mendapatkan jumlah record dari tabel tertentu
function getRecordCount($table) {
    global $conn; // Pastikan koneksi database tersedia
    $sql = "SELECT COUNT(*) as total FROM $table";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}

// Ambil jumlah data dari setiap tabel
$totalUsers = getRecordCount('tbl_users');
$totalCourses = getRecordCount('tbl_course');
$totalMateri = getRecordCount('tbl_materi');
$totalQuizzes = getRecordCount('tbl_quizzes');
$totalQuestions = getRecordCount('questions');
$totalDictionary = getRecordCount('tbl_dictionary');
?>