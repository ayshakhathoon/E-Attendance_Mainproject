<?php
include "db_con.php";
include "session.php";


// subject selection in add teacher

if(isset($_POST['class'])){
    $c_id = $_POST['class'];
    $sql45 = "SELECT * FROM tbl_class where id='$c_id'";

    $result = $conn->query($sql45);
    $row45 = $result->fetch_assoc();
    $sem = $row45['semester'];
    $stream = $row45['stream_name'];
    $course = $row45['course'];
    $sql4 = "SELECT * FROM `tbl1_subject` WHERE `tbl1_subject`.`c_id`='$course' AND `tbl1_subject`.`str_id`='$stream' AND `tbl1_subject`.`sem_id`='$sem'";

    $result4 = $conn->query($sql4);
    $output = "";
    $output .= '<option value="" selected disabled>' ."Select Subject". '</option>';
    while ($row4 = $result4->fetch_assoc()) {
$sid=$row4['s_id'];
$sql46 = "SELECT * FROM class_allocation WHERE sub='$sid' and class='$c_id'";

    $result46 = $conn->query($sql46);
    if($result46->num_rows == 0 ){
        
        $output .= '<option value="' . $row4['s_id'] . '">' . $row4['subject'] . '</option>';
    }
        // $sem--;
    }
    echo $output;
}


if(isset($_POST['cls'])){
    $c_id = $_POST['cls'];
    $tid = $_POST['tch'];
    $sqll = mysqli_query($conn, "select * from tbl_teacher");
    $output = "";
    $output .= '<option value="" selected disabled>' ."Select Teacher". '</option>';
    while ($roww = mysqli_fetch_array($sqll)) {
        $tcid=$roww['t_id'];
        $sqlt = mysqli_query($conn, "select * from class_allocation where teacher='$tcid' and class='$c_id'");
        if($sqlt->num_rows < 2 ){
   
   
        $output .= '<option value="' . $roww['t_id'] . '">' . $roww['fname'] . '</option>';
        
    }
}
    echo $output;
}
?>