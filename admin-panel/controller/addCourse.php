<?php
include '../koneksi/koneksi-db.php';

if (isset($_POST["title"]) && isset($_POST["total_lessons"])) {
    $title = $_POST["title"];
    $total_lessons = $_POST["total_lessons"];
    $target_dir = "../../uploads/";  // Sesuaikan path ke direktori gambar Anda
    $imgCourse = basename($_FILES["imgCourse"]["name"]);
    $target_file = $target_dir . $imgCourse;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $image_size = $_FILES["imgCourse"]["size"];
    $random_name = bin2hex(random_bytes(10));  // Menghasilkan nama acak untuk gambar
    $new_name = $random_name . "." . $imageFileType;

    if ($imgCourse != '') {
        if ($image_size > 500000) {
            echo "<div class='alert alert-warning mt-3' role='alert'>
                    File tidak boleh lebih dari 500 kb
                  </div>";
        } else {
            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != "gif" && $imageFileType != "jpeg") {
                echo "<div class='alert alert-warning mt-3' role='alert'>
                        File harus bertipe jpeg atau jpg atau png atau gif.
                      </div>";
            } else {
                move_uploaded_file($_FILES["imgCourse"]["tmp_name"], $target_dir . $new_name);

                $addCourse = mysqli_query($conn, "INSERT INTO tbl_course (title, imgCourse, total_lessons) VALUES ('$title', '$new_name', '$total_lessons')");

                if ($addCourse) {
                    header("location:../admin-course.php");  // Sesuaikan redirect URL ke halaman yang Anda inginkan
                } else {
                    echo "GAGAL: " . mysqli_error($conn);
                }
            }
        }
    }
}
?>
