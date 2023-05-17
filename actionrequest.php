<?php
include("db_con.php");
session_start();
if (isset($_POST["leave_submit"])) {

  $studid = $_POST["leave_submit"];
  $date = $_POST['date'];
  $day=$_POST['day'];
  $reason = $_POST['leave'];

  $check = mysqli_query($conn, "SELECT * FROM tbl_leave1 WHERE t_id = '$studid' AND leavedate = '$date'");
  if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Leave already requested in the same date.');</script>";
    echo "<script>window.location.href='addleave.php'</script>";
  } else {
    $sql = mysqli_query($conn, "INSERT INTO `tbl_leave1`(`t_id`, `leavedate`, `day`,`reason`,`leavestatus`) VALUES ('$studid','$date','$day','$reason',0)");

    if ($sql) {

      echo "<script>alert('Leave requested');</script>";
      echo "<script>window.location.href='addleave.php'</script>";
    } else {
      echo "<script>alert('ERROR!');</script>";
      echo "<script>window.location.href='addleave.php'</script>";
    }
  }
}

?>