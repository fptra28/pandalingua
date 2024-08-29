<?php
// Mulai sesi dan koneksi ke database
session_start();
require_once('../koneksi/koneksi-db.php');

// Periksa apakah form telah disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $quiz_id = $_POST['quiz_id'];
    $question_text = $_POST['question_text'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_option = $_POST['correct_option'];

    // Verifikasi apakah quiz_id ada di tabel tbl_quiz
    $check_sql = "SELECT quiz_id FROM tbl_quizzes WHERE quiz_id = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("i", $quiz_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // quiz_id ditemukan, lanjutkan untuk menambah pertanyaan
        $sql = "INSERT INTO questions (quiz_id, question_text, option_a, option_b, option_c, option_d, correct_option, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssss", $quiz_id, $question_text, $option_a, $option_b, $option_c, $option_d, $correct_option);

        if ($stmt->execute()) {
            // Jika berhasil, alihkan ke halaman pertanyaan dengan quiz_id
            header("Location: ../admin-question.php?quiz_id=" . $quiz_id);
            exit();
        } else {
            // Simpan pesan error jika gagal eksekusi query
            $_SESSION['error'] = "Gagal menambahkan pertanyaan: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // quiz_id tidak ditemukan, simpan pesan error
        $_SESSION['error'] = "Quiz ID tidak ditemukan.";
    }

    $stmt_check->close();
    $conn->close();
    
    // Redirect kembali jika ada error
    header("Location: ../admin-Quizzes.php");
    exit();
} else {
    // Jika form tidak disubmit, simpan pesan error
    $_SESSION['error'] = "Data tidak valid.";
    header("Location: ../admin-Quizzes.php");
    exit();
}
?>
