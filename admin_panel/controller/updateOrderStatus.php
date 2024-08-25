<?php
include_once "../config/dbconnect.php";

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Get current status
    $sql = "SELECT status FROM learning_progress WHERE user_id='$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    // Toggle status
    if ($row['status'] == 'In Progress') {
        $update = mysqli_query($conn, "UPDATE learning_progress SET status='Completed' WHERE user_id='$user_id'");
    } else {
        $update = mysqli_query($conn, "UPDATE learning_progress SET status='In Progress' WHERE user_id='$user_id'");
    }

    if ($update) {
        echo "Status updated successfully.";
        header("Location: ../index.php?progress=success");
    } else {
        echo "Error: " . mysqli_error($conn);
        header("Location: ../index.php?progress=error");
    }
}
?>
