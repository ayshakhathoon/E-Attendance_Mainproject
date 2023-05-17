<?php
include "db_con.php";
include "session.php";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $class = $_POST['class'];
    $t = $_POST['subject_teacher_1'];
    $sub = $_POST['subject1'];





    $stmt = mysqli_query($conn, "INSERT INTO `class_allocation`(`class`, `teacher`, `sub`) VALUES ('$class','$t','$sub')");

    if ($stmt) {
        echo "<script>alert('Teacher allocated successfully!');window.location='addclsteacher.php'</script>";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <title>Admin panel</title>
</head>

<style>
    .form-control {
        height: 40px;
        box-shadow: none;
        color: #5cb85c;
    }

    .form-control:focus {
        border-color: #5cb85c;
    }

    .form-control,
    .btn {
        border-radius: 8px;
        color: ##299b63;
    }

    .signup-form {
        width: 450px;
        margin: 0 auto;
        padding: 30px 0;
        font-size: 18px;
    }

    .signup-form h2 {
        color: #636363;
        margin: 0 0 15px;
        position: relative;
        text-align: center;
    }

    .signup-form h2:before,
    .signup-form h2:after {
        content: "";
        height: 2px;
        width: 30%;
        background: #5cb85c;
        position: absolute;
        top: 50%;
        z-index: 2;
    }

    .signup-form h2:before {
        left: 0;
    }

    .signup-form h2:after {
        right: 0;
    }

    .signup-form .hint-text {
        color: #999;
        margin-bottom: 35px;
        text-align: center;
    }

    .signup-form form {
        color: #299b63;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.7);
        padding: 30px;
    }

    .signup-form .form-group {
        margin-bottom: 20px;
    }

    .signup-form input[type="checkbox"] {
        margin-top: 3px;
    }

    .signup-form .btn {
        font-size: 25px;
        font-weight: bold;
        min-width: 140px;
        outline: none !important;
    }

    .signup-form .row div:first-child {
        padding-right: 10px;
    }

    .signup-form .row div:last-child {
        padding-left: 10px;
    }

    .signup-form a {
        color: #f2f3f7;
        text-decoration: underline;
    }

    .signup-form a:hover {
        text-decoration: none;
    }

    .signup-form form a {
        color: #5cb85c;
        text-decoration: none;
    }

    .signup-form form a:hover {
        text-decoration: underline;
    }

    .action {
        font-size: 15px;
        font-weight: bold;
        min-width: 140px;
        color: #5cb85c;
        outline: none !important;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        height: 5vh;
        /* adjust this value to fit your needs */
    }

    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    .allocate-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .allocate-btn:hover {
        background-color: #3e8e41;
    }
</style>
<style>
    #admin-heading {
        display: inline;

    }
</style>
</style>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>E-ATTENDANCE</h2>
            </div>
            <!-- <div class="search">
                <a href="phpSearch.php">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>-->

            <h4 id="admin-heading" style="text-align: right;">Welcome Admin</h4>

        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="../Admin/index.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>

                <li>
                    <a href="reghome.php">
                        <i class="fas fa-user-graduate"></i>
                        <div>Register</div>


                    </a>
                </li>
                <li>
                    <a href="viewhome.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>View </div>


                    </a>
                </li>
                <li>
                    <a href="createcourse.php">
                        <i class="fas fa-users"></i>
                        <div>Course</div>
                    </a>
                </li>
                <li>
                    <a href="adddept.php">
                        <i class="fas fa-chart-bar"></i>
                        <div>Department</div>
                    </a>
                </li>
                <li>
                    <a href="addsubject.php">
                        <i class="fas fa-chart-bar"></i>
                        <div>Subjects</div>
                    </a>
                </li>
                <li>
                    <a href="createclass.php">
                        <i class="fas fa-users"></i>
                        <div>Class</div>
                    </a>
                </li>


                <li>
                    <a href="addclsteacher.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Teacher allocation</div>
                    </a>
                </li>
                <li>
                    <a href="tattendance.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Take Attendance</div>
                    </a>
                </li>
                <li>
                    <a href="tvattendance.php">
                        <i class="fa fa-info-circle"></i>
                        <div>View Attendance</div>
                    </a>
                </li>
                <li>
                    <a href="attendancereport.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Attendance Report</div>
                    </a>
                </li>
                <li>
                    <a href="attndpercent.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Attendance Percentage</div>
                    </a>
                </li>
                <li>
                    <a href="request.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Leave Approval</div>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <i class="fa fa-power-off"></i>
                        <div>Logout</div>
                    </a>
                </li>

            </ul>
        </div>

        <!-- partial:index.partial.html -->

        <body>
            <div class="signup-form">

                <!-- HTML form -->
                <form method="post">
                    <h2><b>Teacher allocation</h2></b>
                    <div class="form-group">
                        <div class="row">
                            <label for="class">Class:</label>

                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                            $sql = mysqli_query($conn, "SELECT * FROM tbl_class");
                            ?>
                            <select name="class" id="class" class="form-control" onInput="classcheck()">
                                <option value="" selected disabled>Select Class</option>
                                <?php
                                while ($row = mysqli_fetch_array($sql)) {
                                    // Fetch batch details from tbl1_batch using b_id
                                    $batch_query = mysqli_query($conn, "SELECT a.batch as batch,b.stream as st,c.course as co FROM tbl1_batch as a
                                     INNER JOIN tbl1_stream as b INNER JOIN tbl1_course as c ON a.str_id=b.str_id AND a.c_id=c.c_id AND a.b_id = {$row[6]}");
                                    $batch_row = mysqli_fetch_array($batch_query);

                                    // Display class and batch information
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $batch_row['st'] ." ". $batch_row['co'] . " " . $row[1] . "-" . $row[2] . " " . $batch_row[0] ?></option>
                                    <?php
                                }
                                ?>

                            </select>
                        </div><br>

                        <!-- <div class="form-group">
                            <label for="class_teacher">Class Teacher:</label>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                            $sql = mysqli_query($conn, "select * from tbl_teacher");
                            ?>
                            <select name="class_teacher" id="class_teacher" class="form-control">
                                <?php
                                while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div> -->

                        <div class="form-group">

                            <label for="subject_teacher1">Subject :</label>
                            <select name="subject1" id="subject1" onInput="tcheck()" required>
                                <option value="" hidden>--Select Subject--</option>
                            </select><br>
                        </div>

                        <div class="form-group">

                            <label for="subject_teacher1">Subject :</label>
                            <select name="subject_teacher_1" id="subject_teacher1" required>
                                <option value="">--Select Teacher--</option>
                            </select><br>
                        </div>
                        <!-- <div class="form-group">
                            <label for="subject_teacher1">Subject :</label>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                            $sql = mysqli_query($conn, "select * from tbl_subject");
                            ?>
                            <select name="subject1" id="subject1" onchange="updateDropdown()" class="form-control">
                            <option value="" selected disabled>Select Subject</option>
                                <?php
                                while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[4] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="subject_teacher1">Subject Teacher:</label>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                            $sqll = mysqli_query($conn, "select * from tbl_teacher");
                            ?>
                            <select name="subject_teacher_1" id="subject_teacher1" class="form-control">
                                <option value="" selected disabled>Select Teacher</option>
                                <?php
                                while ($roww = mysqli_fetch_array($sqll)) {
                                    $tid = $roww['t_id'];
                                    $sqlt = mysqli_query($conn, "select * from class_allocation where teacher='$tid'");
                                    $rowt = mysqli_num_rows($sqlt);
                                    if ($rowt < 2) {

                                        ?>
                                    <option value="<?php echo $roww['t_id'] ?>"><?php echo $roww['fname'] ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div> -->


                        <!-- <div class="form-group">
                            <label for="subject_teacher2">Subject2 :</label>
                            <select name="subject2" id="subject2" class="form-control">
                                <?php
                                $sql = mysqli_query($conn, "select * from tbl_subject");
                                while ($row = mysqli_fetch_array($sql)) {
                                    if ($row[0] != $_POST['subject1']) { // check if the current row is not equal to the selected value from the first dropdown
                                        ?>
                                        <option value="<?php echo $row[0] ?>"><?php echo $row[4] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div> -->


                        <!-- <div class="form-group">
                            <label for="subject_teacher1">Subject2 Teacher:</label>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                            $sqll = mysqli_query($conn, "select * from tbl_teacher");
                            ?>
                            <select name="subject_teacher_1" id="subject_teacher1" class="form-control">
                                <?php
                                while ($roww = mysqli_fetch_array($sqll)) {
                                    ?>
                                    <option value="<?php echo $roww['t_id'] ?>"><?php echo $roww['fname'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="subject_teacher2">Subject3 :</label>
                            <select name="subject2" id="subject2" class="form-control">
                                <?php
                                $sql = mysqli_query($conn, "select * from tbl_subject");
                                while ($row = mysqli_fetch_array($sql)) {
                                    if ($row[0] != $_POST['subject1']) { // check if the current row is not equal to the selected value from the first dropdown
                                        ?>
                                        <option value="<?php echo $row[0] ?>"><?php echo $row[4] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div> -->


                        <!-- <div class="form-group">
                            <label for="subject_teacher1">Subject3 Teacher:</label>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                            $sqll = mysqli_query($conn, "select * from tbl_teacher");
                            ?>
                            <select name="subject_teacher_1" id="subject_teacher1" class="form-control">
                                <?php
                                while ($roww = mysqli_fetch_array($sqll)) {
                                    ?>
                                    <option value="<?php echo $roww['t_id'] ?>"><?php echo $roww['fname'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="subject_teacher2">Subject4 :</label>
                            <select name="subject2" id="subject2" class="form-control">
                                <?php
                                $sql = mysqli_query($conn, "select * from tbl_subject");
                                while ($row = mysqli_fetch_array($sql)) {
                                    if ($row[0] != $_POST['subject1']) { // check if the current row is not equal to the selected value from the first dropdown
                                        ?>
                                        <option value="<?php echo $row[0] ?>"><?php echo $row[4] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div> -->


                        <!-- <div class="form-group">
                            <label for="subject_teacher1">Subject4 Teacher:</label>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                            $sqll = mysqli_query($conn, "select * from tbl_teacher");
                            ?>
                            <select name="subject_teacher_1" id="subject_teacher1" class="form-control">
                                <?php
                                while ($roww = mysqli_fetch_array($sqll)) {
                                    ?>
                                    <option value="<?php echo $roww['t_id'] ?>"><?php echo $roww['fname'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="subject_teacher2">Subject5 :</label>
                            <select name="subject2" id="subject2" class="form-control">
                                <?php
                                $sql = mysqli_query($conn, "select * from tbl_subject");
                                while ($row = mysqli_fetch_array($sql)) {
                                    if ($row[0] != $_POST['subject1']) { // check if the current row is not equal to the selected value from the first dropdown
                                        ?>
                                        <option value="<?php echo $row[0] ?>"><?php echo $row[4] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div> -->


                        <!-- <div class="form-group">
                            <label for="subject_teacher1">Subject5 Teacher:</label>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                            $sqll = mysqli_query($conn, "select * from tbl_teacher");
                            ?>
                            <select name="subject_teacher_1" id="subject_teacher1" class="form-control">
                                <?php
                                while ($roww = mysqli_fetch_array($sqll)) {
                                    ?>
                                    <option value="<?php echo $roww['t_id'] ?>"><?php echo $roww['fname'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div> -->


                    </div>

                    <b>
                        <input type="submit" name="submit" value="Allocate" class="allocate-btn">

                </form>

                <script>
                    function classcheck() {
                        var q = $("#class").val();
                        // alert("hi");
                        jQuery.ajax({
                            url: "ajax1.php",
                            type: "post",
                            data: "class=" + $("#class").val(),
                            success: function (dataResult) {
                                $("#subject1").html(dataResult);
                            }
                        });
                    }

                    function tcheck() {

                        jQuery.ajax({
                            url: "ajax1.php",
                            type: "post",
                            data: "cls=" + $("#class").val() + "&tch" + $("#subject1").val(),
                            success: function (dataResult) {
                                $("#subject_teacher1").html(dataResult);

                            }
                        });
                    }
                </script>
        </body>

</html>