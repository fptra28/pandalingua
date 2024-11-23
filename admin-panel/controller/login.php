<?php
session_start();
include './koneksi/koneksi-db.php'; // File untuk koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = ($_POST['password']);

    $query = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin'] = $username;
        header("Location: admin-dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>