<?php
require_once '../koneksi/koneksi-db.php';  // Pastikan file koneksi database di-include
require_once '../controller/deleteCourse.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $deleteQuery = "DELETE FROM tbl_course WHERE course_id = $id";

    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: ../admin-Course.php?status=success");
    } else {
        header("Location: ../admin-Course.php?status=error");
    }
    exit();
} else {
    header("Location: ../admin-Course.php");
    exit();
}
?>
