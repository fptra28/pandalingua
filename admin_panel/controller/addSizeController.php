<?php
    include_once "../config/dbconnect.php";
    
    if (isset($_POST['upload'])) {
        $question = $_POST['question'];
        $optionA = $_POST['optionA'];
        $optionB = $_POST['optionB'];
        $optionC = $_POST['optionC'];
        $optionD = $_POST['optionD'];
        $correctOption = $_POST['correctOption'];

        $insert = mysqli_query($conn, "INSERT INTO quizzes (question, optionA, optionB, optionC, optionD, correctOption) 
                                       VALUES ('$question', '$optionA', '$optionB', '$optionC', '$optionD', '$correctOption')");
 
        if (!$insert) {
            echo mysqli_error($conn);
            header("Location: ../index.php?quiz=error");
        } else {
            echo "Quiz added successfully.";
            header("Location: ../index.php?quiz=success");
        }
    }
?>
