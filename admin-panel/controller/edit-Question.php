<?php
include '../koneksi/koneksi-db.php';

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $quiz_id = $_POST['quiz_id'];
    $id = $_POST['id']; // Pastikan ada input hidden 'id' di form
    $question_text = htmlspecialchars($_POST['question_text']);
    $option_a = htmlspecialchars($_POST['option_a']);
    $option_b = htmlspecialchars($_POST['option_b']);
    $option_c = htmlspecialchars($_POST['option_c']);
    $option_d = htmlspecialchars($_POST['option_d']);
    $correct_option = htmlspecialchars($_POST['correct_option']);
    
    // Update query untuk mengubah pertanyaan
    $stmt_update = $conn->prepare("UPDATE questions SET question_text = ?, option_a = ?, option_b = ?, option_c = ?, option_d = ?, correct_option = ? WHERE id = ?");
    $stmt_update->bind_param("ssssssi", $question_text, $option_a, $option_b, $option_c, $option_d, $correct_option, $id);
    
    if ($stmt_update->execute()) {
        // Redirect kembali ke halaman list pertanyaan setelah berhasil mengedit
        header("Location: ../admin-question.php?quiz_id=" . urlencode($quiz_id));
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
