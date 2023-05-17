<?php
include "db_con.php";
include "session.php";

if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $course = $_POST['cid'];
    $stream_name = $_POST['sid'];
    $semester = $_POST['semid'];
    $batch = $_POST['bid'];
    

    $class_teacher = $_POST['class_teacher'];

    $stmt = mysqli_query($conn, "INSERT INTO `tbl_class`(`from`,`to`,`course`,`stream_name`,`semester`,`batch`,`class_teacher`) VALUES('$from','$to','$course','$stream_name','$semester','$batch','$class_teacher')");
   
    if ($stmt) {
        echo "<script>alert('Class registered successfully!');window.location='createclass.php'</script>";
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
        color: #299b63;
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
        font-size: 15px;
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
</style>
<style>
    #admin-heading {
        display: inline;

    }
</style>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>E-ATTENDANCE</h2>
            </div>
            <!-- <div class="search">
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
    </div>

    <body>
        <div class="signup-form">
            <form action="" method="post" onsubmit="return()">
                <h2>ADD CLASS</h2>

                <label for="academicyear">Academic Year:</label><br><br>
                <label for="academicyear">From:</label>
                <select name="from" id="from" required>
                    <option value="">Select Year</option>
                    <?php
                    for ($i = 1990; $i <= 2050; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                </select>
                <label for="academicyear">To:</label>
                <select name="to" id="to" required>
                    <option value="">Select Year</option>
                    <?php
                    for ($i = 1991; $i <= 2050; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                </select>

                <script>
                    // Get references to the "From" and "To" dropdowns
                    const fromDropdown = document.getElementById("from");
                    const toDropdown = document.getElementById("to");

                    // Set the default "From" year to the current year
                    const currentYear = new Date().getFullYear();
                    fromDropdown.value = currentYear;

                    // Clear the options in the "To" dropdown
                    toDropdown.innerHTML = "<option value=\"\">Select Year</option>";

                    // Add options to the "To" dropdown for the years after the selected year in the "From" dropdown
                    for (let i = currentYear + 1; i <= 2050; i++) {
                        const option = document.createElement("option");
                        option.value = i;
                        option.text = i;
                        toDropdown.add(option);
                    }

                    // Add an event listener to the "From" dropdown
                    fromDropdown.addEventListener("change", function () {
                        // Get the selected year from the "From" dropdown
                        const fromYear = parseInt(fromDropdown.value);

                        // Clear the options in the "To" dropdown
                        toDropdown.innerHTML = "<option value=\"\">Select Year</option>";

                        // Add options to the "To" dropdown for the years after the selected year in the "From" dropdown
                        for (let i = fromYear + 1; i <= 2050; i++) {
                            const option = document.createElement("option");
                            option.value = i;
                            option.text = i;
                            toDropdown.add(option);
                        }
                    });
                </script>

                <br><br>



                <label for="course">Course:</label>


                <select name="cid" id="cid" onInput="chek()" required>
                    <option value="">--select--</option>
                    <?php
                    $sql = mysqli_query($conn, "select * from tbl1_course");
                    while ($row = mysqli_fetch_array($sql)) {

                        ?>
                        <option value="<?php echo $row['c_id'] ?>"><?php echo $row['course'] ?></option>

                        <?php

                    }
                    ?>

                </select>

                <?php



                // $sql1 = mysqli_query($conn, "select * from tbl1_stream");
                ?>
                <div class="form-group">
                    <br> <label>Stream Name</label>


                    <select name="sid" id="sid" onInput="chek1()" required>
                        <option value="">--Select Stream--</option>
                    </select><br>
                </div>

                <div class="form-group">

                    <label for="semester">semester</label>
                    <select name="semid" id="semid" required>
                        <option value="">--Select Stream--</option>
                    </select><br>
                </div>

                <div class="form-group">

                    <label for="semester">Batch</label>
                    <select name="bid" id="bid" required>
                        <option value="">--Select Batch--</option>
                    </select><br>
                </div>

                <div class="form-group">
                    <label for="class_teacher">Class Teacher:</label>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                    $sql = mysqli_query($conn, "select * from tbl_teacher where status=0");
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
                </div>


                <input type="submit" name="submit" value="Submit">
            </form>
        </div>

        <script>
            function chek() {
                jQuery.ajax({
                    url: "get_stream.php",
                    type: "post",
                    data: "cid=" + $("#cid").val(),
                    success: function (dataResult) {
                        $("#sid").html(dataResult);
                    }
                });
            }

            function chek1() {
                $.ajax({
                    url: "a.php",
                    type: "post",
                    data: { sid: $("#sid").val() },
                    success: function (dataResult) {
                        $("#semid").html("");
                        $("#semid").append(dataResult);
                    }
                });

                $.ajax({
                    url: "b.php",
                    type: "post",
                    data: { sid: $("#sid").val() },
                    success: function (dataResult) {
                        // alert(dataResult);
                        $("#bid").html("");
                        $("#bid").append(dataResult);
                    }
                });
            }

            // function chek2() {
            //     jQuery.ajax({
            //         url: "b.php",
            //         type: "post",
            //         data: "sid=" + $("#sid").val(),
            //         success: function (dataResult) {
            //             alert(dataResult);
            //             $("#bid").html(dataResult);
            //         }
            //     });
            // }

        </script>

        </form>
    </body>

</html>