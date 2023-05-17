<?php
include "db_con.php";
include "session.php";

if (isset($_POST['submit'])) {
    $course = $_POST['cid'];
    $stream = $_POST['sid'];
    $sem = $_POST['semid'];
    $sub = $_POST['subject'];

$qry="INSERT INTO `tbl1_subject`(`c_id`, `str_id`, `subject`, `sem_id`) VALUES('$course','$stream','$sub','$sem')";
$rslt=mysqli_query($conn,$qry);
if($rslt){?>
    <script>alert("Subject Added Sucessfully");</script>
   <?php
}else{?>
    <script>alert("Error");</script>
   <?php
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
    <title>Admin panel</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
                <form action="" method="post" onsubmit="return Validatename()">
                    <h2>Add subject</h2>
                    <div class="form-group">
                        <div class="row">
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

                            <br>




                            <div class="form-group">
                                <label for="subject">Subject</label>

                                <input type="text" name="subject" placeholder="Enter subject_name" id="subject"
                                    onkeyup="return Validatename()" required />
                                <span id="ln" style="color: red;"></span>
                                <br>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit">

                            </div>



                </form>
                <div class="abcd">
                    <a href="../Admin/index.php">Back to home</a>

                </div>


        <script type="text/javascript">
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
                jQuery.ajax({
                    url: "a.php",
                    type: "post",
                    data: "sid=" + $("#sid").val(),
                    success: function (dataResult) {
                        $("#semid").html(dataResult);
                    }
                });
            }

            // function che() {
            //     var val = document.getElementById('sid').value;
            //     document.cookie = "myJavascriptVar =" + val;

            // var javascriptVar = 'success';


            // }
            function Validatename() {
                var val = document.getElementById('subject').value;
                if (!val.match(/^[A-Z].*$/)) {
                    document.getElementById('ln').innerHTML = "Start with a Capital letter & Only alphabets are allowed";
                    document.getElementById('subject').value = val;
                    document.getElementById('subject').style.color = "red";
                    return false;
                    flag = 1;
                }
                if (val.length < 3 || val.length > 30) {
                    document.getElementById('ln').innerHTML = "Between 10 to 50 characters";
                    document.getElementById('subject').value = val;


                    document.getElementById('subject').style.color = "red";
                    return false;

                }
                else {


                    document.getElementById('ln').innerHTML = " ";
                    document.getElementById('subject').style.color = "green";
                    return true;
                }
            }


        </script>

        </div>
        </form>