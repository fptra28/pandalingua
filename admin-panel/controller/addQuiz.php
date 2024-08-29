<?php
if (isset($_POST['submit'])) {
    // Include database connection file
    include '../koneksi/koneksi-db.php';

    // Retrieve form data
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    // Prepare and execute SQL query to insert quiz
    $stmt = $conn->prepare("INSERT INTO tbl_quizzes (course_id, title, `desc`) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $course_id, $title, $desc);

    if ($stmt->execute()) {
        header("location:../admin-Quizzes.php");  // Sesuaikan redirect URL ke halaman yang Anda inginkan
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
