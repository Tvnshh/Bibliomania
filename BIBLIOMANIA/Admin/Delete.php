<?php
include("../assets/conn.php");
?>

<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql_check_moderator = "SELECT * FROM moderator WHERE moderator_id='$id'";
    $result_mod = $conn->query($sql_check_moderator);

    if ($result_mod->num_rows > 0) {

        $sql_moderator_slides = "DELETE FROM slides WHERE moderator_id='$id'";
        $conn->query($sql_moderator_slides);

        $sql_moderator = "DELETE FROM moderator WHERE moderator_id='$id'";
        $conn->query($sql_moderator);

    } else {
        $sql_check_student = "SELECT * FROM student WHERE student_id='$id'";
        $result_stu = $conn->query($sql_check_student);

        if ($result_stu-> num_rows > 0) {

            $sql_student_quizresult = "DELETE FROM quiz_results WHERE student_id='$id'";
            $conn->query($sql_student_quizresult);

            $sql_student_quiztime = "DELETE FROM quiz_times WHERE student_id='$id'";
            $conn->query($sql_student_quiztime);

            $sql_student_score = "DELETE FROM scores WHERE student_id='$id'";
            $conn->query($sql_student_score);

            $sql_student = "DELETE FROM student WHERE student_id='$id'";
            $conn->query($sql_student);

        }
    }
}

header("location:View_All_Users.php");
exit;
?>