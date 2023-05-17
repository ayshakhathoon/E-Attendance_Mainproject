<?php
include "db_con.php";
include "session.php";

if(isset($_POST['sid'])){
    $category_id = $_POST['sid'];
    $sql45 = $conn->prepare("SELECT * FROM tbl1_stream where str_id=?");
    $sql45->bind_param("i", $category_id);
    $sql45->execute();
    $result = $sql45->get_result();
    $row45 = $result->fetch_assoc();
    $sem = $row45['sem'];
    $output .= '<option value="" selected disabled>-Select Semester-</option>';
    while ($sem > 0) {
        $output .= '<option value="' . $sem . '">Semester ' . $sem . '</option>';
        $sem--;
    }
    echo $output;
}

?>