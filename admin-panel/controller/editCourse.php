<?php
include '../koneksi/koneksi-db.php';

if (isset($_POST["course_id"])) {
    $course_id = intval($_POST["course_id"]);
    $title = $_POST["title"];
    $total_lessons = $_POST["total_lessons"];
    
    $imgCourse = $_FILES["imgCourse"]["name"];
    $imageUpdated = false;
    
    if ($imgCourse != '') {
        $target_dir = "../uploads/";
        $imageFileType = strtolower(pathinfo($imgCourse, PATHINFO_EXTENSION));
        $random_name = bin2hex(random_bytes(10));
        $new_name = $random_name . "." . $imageFileType;
        $target_file = $target_dir . $new_name;
        $image_size = $_FILES["imgCourse"]["size"];

        if ($image_size > 500000) {
            echo "<div class='alert alert-warning mt-3' role='alert'>
                    File tidak boleh lebih dari 500 kb
                  </div>";
            exit();
        } elseif (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "<div class='alert alert-warning mt-3' role='alert'>
                    File harus bertipe jpeg, jpg, png, atau gif.
                  </div>";
            exit();
        } else {
            if (move_uploaded_file($_FILES["imgCourse"]["tmp_name"], $target_file)) {
                $imageUpdated = true;
            } else {
                echo "Gagal mengupload gambar.";
                exit();
            }
        }
    }

    $updateQuery = "UPDATE tbl_course SET title='$title', total_lessons='$total_lessons'";

    if ($imageUpdated) {
        $updateQuery .= ", imgCourse='$new_name'";
    }

    $updateQuery .= " WHERE course_id=$course_id";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: ../admin-Course.php");
        exit();
    } else {
        echo "Gagal mengupdate course: " . mysqli_error($conn);
    }
}
?>
