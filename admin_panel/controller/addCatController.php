<?php
include_once "../config/dbconnect.php";

if(isset($_POST['upload']))
{
    // Mengambil data dari form
    $hanzi = $_POST['hanzi'];
    $pinyin = $_POST['pinyin'];
    $bahasa_indonesia = $_POST['bahasa_indonesia'];
    
    // Query untuk memasukkan data ke dalam tabel category
    $insert = mysqli_query($conn, "INSERT INTO category (hanzi, pinyin, bahasa_indonesia) 
                                   VALUES ('$hanzi', '$pinyin', '$bahasa_indonesia')");
    
    if(!$insert)
    {
        // Jika terjadi kesalahan, tampilkan pesan error dan arahkan kembali ke halaman dengan status error
        echo mysqli_error($conn);
        header("Location: ../index.php?category=error");
    }
    else
    {
        // Jika berhasil, tampilkan pesan sukses dan arahkan kembali ke halaman dengan status sukses
        echo "Records added successfully.";
        header("Location: ../index.php?category=success");
    }
}
?>
