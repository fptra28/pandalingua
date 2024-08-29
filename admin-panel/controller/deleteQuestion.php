<?php
// Load koneksi database
include_once '../koneksi/koneksi-db.php';

// Mengambil id dan quiz_id dari URL dengan aman
$quiz_id = isset($_GET['quiz_id']) ? intval($_GET['quiz_id']) : 0;
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Validasi id
if ($id <= 0) {
    die("Invalid ID");
}

// Query untuk menghapus pertanyaan
$queryDelete = "DELETE FROM questions WHERE id = ?";
if ($stmt = $conn->prepare($queryDelete)) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Debugging output
        // echo "Quiz ID: " . htmlspecialchars($quiz_id);

        // Redirect setelah berhasil dihapus
        header("Location: ../admin-question.php?quiz_id=" . urlencode($quiz_id));
        exit();
    } else {
        die("Error executing query: " . $stmt->error);
    }
} else {
    die("Query preparation failed: " . $conn->error);
}
?>