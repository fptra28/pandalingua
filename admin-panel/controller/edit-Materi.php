<?php
include '../koneksi/koneksi-db.php';

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $course_id = $_POST['course_id']; // ID course
    $lesson_id = $_POST['lesson_id']; // ID materi (lesson_id)
    $title = htmlspecialchars($_POST['title']); // Judul materi
    $content = htmlspecialchars($_POST['content']); // Konten materi

    // Update query untuk mengubah materi
    $stmt_update = $conn->prepare("UPDATE tbl_materi SET title = ?, content = ? WHERE lesson_id = ? AND course_id = ?");
    $stmt_update->bind_param("ssii", $title, $content, $lesson_id, $course_id);
    
    if ($stmt_update->execute()) {
        // Redirect kembali ke halaman materi setelah berhasil mengedit
        header("Location: ../admin-materi.php?course_id=" . urlencode($course_id));
        exit();
    } else {
        echo "Error: " . $stmt_update->error;
    }

    // Tutup statement
    $stmt_update->close();
}

// Tutup koneksi database
$conn->close();
?>
