<?php
include "db_con.php";
include "session.php";
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
    <title>Student home</title>

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
            background-image: url('pic1.jpg');
            background-repeat: no-repeat;
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

        input {
            width: 100%;
        }

        select {
            width: 100%;
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
    </style>
</head>


<style>
    .topbar .user p {
        margin: 0;
        font-size: 1re color: #299B63;


        /* Add this line */
    }
</style>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

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

            <div class="user">
                <?php
                $currentuser = $_SESSION['adn_no'];
                $sql1 = "SELECT * FROM `tbl_teacher` WHERE t_id='$currentuser'";
                $gotresult = mysqli_query($conn, $sql1);
                if ($gotresult) {
                    if (mysqli_num_rows($gotresult) > 0) {
                        while ($row1 = mysqli_fetch_array($gotresult)) {
                            ?><br>
                            <h3><span>WELCOME&nbsp;&nbsp;
                                    <?php echo $row1['fname']; ?>&nbsp;
                                    <?php echo $row1['lname']; ?>
                                </span></h3>
                            <?php
                        }
                    }
                }
                ?>
            </div>

        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="../Teacher/tindex.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>

                <li>
                    <a href="../Teacher/updateprofilet.php">
                        <i class="fas fa-user-graduate"></i>
                        <div>Update profile</div>


                    </a>
                </li>
                <li>
                    <a href="../Teacher/myattendance.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>Attendance </div>


                    </a>
                </li>

                <li>
                    <a href="../Teacher/t.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>Take attendance </div>


                    </a>
                </li>


                <li>
                    <a href="../Teacher/viewstu.php">
                        <i class="fas fa-users"></i>
                        <div>View attendance</div>
                    </a>
                </li>
                <li>
                    <a href="../Teacher/studreport.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>Attendance report </div>


                    </a>
                </li>
                <li>
                    <a href="../Teacher/atnpercent.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>Attendance Percentage </div>


                    </a>
                <li>
                    <a href="../Teacher/request.php">
                        <i class="fas fa-chart-bar"></i>
                        <div>Leave approval</div>
                    </a>
                </li>
                <li>
                    <a href="addleave.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Leave Apply</div>
                    </a>
                </li>
                <li>
                    <a href="status.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Leave Status</div>
                    </a>
                </li>


                <li>
                    <a href="../Teacher/logout.php">
                        <i class="fa fa-power-off"></i>
                        <div>Logout</div>
                    </a>
                </li>

            </ul>
        </div>

        <body>
            <div class="main">
                <?php
                $date = date("Y-m-d");

                // Check if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

                    $sqld = "SELECT * FROM tbl_attendance WHERE date = '$date'";
                    $resultd = mysqli_query($conn, $sqld);
                    if ($resultd->num_rows == 0) {
                        // Loop through each student to get the attendance
                        foreach ($_POST['1st'] as $adn_no => $attendance) {
                            // Fetch the student's class name from the database
                            $sql = "SELECT * FROM tbl_stud WHERE adn_no = '$adn_no'";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $cid = $row['class_name'];
                                // Set the attendance value based on whether the checkbox is checked or not
                                
                                // Insert the attendance into the database
                                $sql = "INSERT INTO tbl_attendance ( `adn_no`, `class_name`, `1st`,`date`) VALUES ('$adn_no', '$cid', '$attendance','$date')";
                                mysqli_query($conn, $sql);
                            }
                        }

                        if (!empty($_POST['2nd'])) {
                            foreach ($_POST['2nd'] as $t_idu => $snd) {
                                if (empty($snd)) {
                                    $snd = '';
                                }
                                $sqlu = "UPDATE `tbl_attendance` SET `2nd`='$snd' WHERE `adn_no`='$t_idu' AND `date`='$date'";
                                mysqli_query($conn, $sqlu);

                            }
                        }
                        if (!empty($_POST['3rd'])) {
                            foreach ($_POST['3rd'] as $t_id3 => $snd3) {


                                $sql3 = "UPDATE `tbl_attendance` SET `3rd`='$snd3' WHERE `adn_no`='$t_id3' AND `date`='$date'";
                                mysqli_query($conn, $sql3);

                            }
                        }
                        if (!empty($_POST['4th'])) {
                            foreach ($_POST['4th'] as $t_id4 => $snd4) {


                                $sql4 = "UPDATE `tbl_attendance` SET `4th`='$snd4' WHERE `adn_no`='$t_id4' AND `date`='$date'";
                                mysqli_query($conn, $sql4);

                            }
                        }
                        if (!empty($_POST['5th'])) {
                            foreach ($_POST['5th'] as $t_id5 => $snd5) {

                                $sql5 = "UPDATE `tbl_attendance` SET `5th`='$snd5' WHERE `adn_no`='$t_id5' AND `date`='$date'";
                                mysqli_query($conn, $sql5);

                            }
                        }
                        if (!empty($_POST['6th'])) {
                            foreach ($_POST['6th'] as $t_id6 => $snd6) {

                                $sql6 = "UPDATE `tbl_attendance` SET `6th`='$snd6' WHERE `adn_no`='$t_id6' AND `date`='$date'";
                                mysqli_query($conn, $sql6);

                            }
                        }

                        echo "Attendance taken successfully!";
                    } else {
                        echo "Attendance already taken!";
                    }
                }

                $queryc = "SELECT * FROM tbl_class where class_teacher='$currentuser'";
                $resultc = mysqli_query($conn, $queryc);
                $rowc = mysqli_fetch_array($resultc);
                $cid = $rowc['id'];
                // Display the form to take attendance
                $sql = "SELECT * FROM tbl_stud where class_name='$cid'";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    echo "<form method='POST'>";

                    echo "<table border='1'>";
                    echo "<tr><th>Teacher ID</th><th>Teacher Name</th><th>1st Hour</th><th>2nd hour</th><th>3rd hour</th><th>4th hour</th><th>5th hour</th><th>6th hour</th></tr>";

                    // Loop through each teacher and display their name and attendance options
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";

                        echo "<td>" . $row['adn_no'] . "</td>";
                        echo "<td>" . $row['fname'] . "</td>";
                        echo "<td>
                        <input type='hidden' name='1st[" . $row['adn_no'] . "]' value='absent'>
                        <input type='checkbox' name='1st[" . $row['adn_no'] . "]' value='present' checked></td>";
                        // echo "</tr>";
                        echo "<td><input type='checkbox' name='2nd[" . $row['adn_no'] . "]' value='present' checked></td>";
                        echo "<td><input type='checkbox' name='3rd[" . $row['adn_no'] . "]' value='present' checked></td>";
                        echo "<td><input type='checkbox' name='4th[" . $row['adn_no'] . "]' value='present' checked></td>";
                        echo "<td><input type='checkbox' name='5th[" . $row['adn_no'] . "]' value='present' checked></td>";
                        echo "<td><input type='checkbox' name='6th[" . $row['adn_no'] . "]' value='present' checked></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    echo "<button type='submit' name='submit' value='submit'>submit<button>";
                    echo "</form>";
                } else {
                    echo "No teachers found!";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>

            </div>
            <!-- partial -->
            <script src="js/bootstrap.js"></script>
            <script src="js/jquery.dcjqaccordion.2.7.js"></script>
            <script src="js/scripts.js"></script>
            <script src="js/jquery.slimscroll.js"></script>
            <script src="js/jquery.nicescroll.js"></script>
            <script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script>
        </body>

</html>
<!-- partial -->
<!--!--<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
</body>

</html>






</body>

</html>