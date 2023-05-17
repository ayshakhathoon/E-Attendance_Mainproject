<?php
include "db_con.php";
include "session.php";
if(isset($_POST['sid'])){
    $category_id = $_POST['sid'];
    $sql45 = $conn->prepare("SELECT * FROM tbl1_batch where str_id=?");
    $sql45->bind_param("i", $category_id);
    $sql45->execute();
    $result = $sql45->get_result();
    $output = "";
    while ($row45 = $result->fetch_assoc()) {
        $output .= '<option value="' . $row45['b_id'] . '">Batch ' . $row45['batch'] . '</option>';
    }
    echo $output;
}

?>