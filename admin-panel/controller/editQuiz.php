<?php
include '../koneksi/koneksi-db.php';

// Cek apakah form telah disubmit
if (isset($_POST['submit'])) {
    $quiz_id = $_POST['quiz_id'];
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    // Validasi input
    if (empty($quiz_id) || empty($course_id) || empty($title) || empty($desc)) {
        $_SESSION['error'] = "Semua field harus diisi.";
        header("Location: ../admin-Quizzes.php");
        exit();
    }

    // Update data quiz
    $sql = "UPDATE tbl_quizzes SET course_id = ?, title = ?, `desc` = ? WHERE quiz_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issi", $course_id, $title, $desc, $quiz_id);

    if ($stmt->execute()) {
        // Redirect ke halaman admin quizzes setelah update berhasil
        header("Location: ../admin-Quizzes.php");
        exit();
    } else {
        $_SESSION['error'] = "Gagal memperbarui quiz: " . $stmt->error;
        header("Location: ../admin-Quizzes.php");
        exit();
    }
    
    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error'] = "Data tidak valid.";
    header("Location: ../admin-Quizzes.php");
    exit();
}
?>