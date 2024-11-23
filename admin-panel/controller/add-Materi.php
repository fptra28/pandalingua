<?php
// Mulai sesi dan koneksi ke database
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ./admin-login.php");
    exit();
}

require_once('../koneksi/koneksi-db.php');

// Periksa apakah form telah disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Verifikasi apakah course_id ada di tabel tbl_courses
    $check_sql = "SELECT course_id FROM tbl_course WHERE course_id = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("i", $course_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // course_id ditemukan, lanjutkan untuk menambah materi
        $sql = "INSERT INTO tbl_materi (course_id, title, content, create_at) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $course_id, $title, $content);

        if ($stmt->execute()) {
            // Jika berhasil, alihkan ke halaman materi dengan course_id
            header("Location: ../admin-materi.php?course_id=" . $course_id);
            exit();
        } else {
            // Simpan pesan error jika gagal eksekusi query
            $_SESSION['error'] = "Gagal menambahkan materi: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // course_id tidak ditemukan, simpan pesan error
        $_SESSION['error'] = "Course ID tidak ditemukan.";
    }

    $stmt_check->close();
    $conn->close();

    // Redirect kembali jika ada error
    header("Location: ../admin-course.php");
    exit();
} else {
    // Jika form tidak disubmit, simpan pesan error
    $_SESSION['error'] = "Data tidak valid.";
    header("Location: ../admin-course.php");
    exit();
}
?>
