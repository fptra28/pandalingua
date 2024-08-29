<?php
session_start();
include '../koneksi/koneksi-db.php';

// Cek apakah ada quiz_id yang dikirimkan melalui URL
if (isset($_GET['id'])) {
    $quiz_id = $_GET['id'];

    // Mulai transaksi
    $conn->begin_transaction();

    try {
        // Query untuk menghapus semua pertanyaan terkait di tabel question berdasarkan quiz_id
        $delete_questions_sql = "DELETE FROM questions WHERE quiz_id = ?";
        $stmt_delete_questions = $conn->prepare($delete_questions_sql);
        $stmt_delete_questions->bind_param("i", $quiz_id);
        $stmt_delete_questions->execute();
        $stmt_delete_questions->close();

        // Query untuk menghapus quiz di tabel tbl_quiz berdasarkan quiz_id
        $delete_quiz_sql = "DELETE FROM tbl_quizzes WHERE quiz_id = ?";
        $stmt_delete_quiz = $conn->prepare($delete_quiz_sql);
        $stmt_delete_quiz->bind_param("i", $quiz_id);
        $stmt_delete_quiz->execute();
        $stmt_delete_quiz->close();

        // Jika kedua query berhasil, commit transaksi
        $conn->commit();
        
        // Redirect ke halaman admin quizzes setelah delete berhasil
        header("Location: ../admin-Quizzes.php");
        exit();
    } catch (Exception $e) {
        // Rollback transaksi jika ada kesalahan
        $conn->rollback();
        echo "Error deleting record: " . $e->getMessage();
    }
} else {
    echo "Quiz ID tidak ditemukan.";
}
?>
