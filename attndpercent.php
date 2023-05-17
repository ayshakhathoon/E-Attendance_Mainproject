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
        width: 80%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 10px;
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

        <div class="main">
            <h1 style="padding:20px;color:red;">Attendance Percentage</h1>
            <table id="approve" class="content-table" border="1" style="margin:20px;">
                <tr>
                    <th>Name</th>
                    <th>Total </th>
                    <th>Present</th>
                    <th>Percentage</th>
                </tr>
                <?php

                // $queryc = "SELECT * FROM tbl_class where class_teacher='$currentuser'";
// $resultc = mysqli_query($conn, $queryc);
//         $rowc = mysqli_fetch_array($resultc);
// $cid=$rowc['id'];
                
                $query = "SELECT * FROM tbl_teacher";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $tid = $row['t_id'];
                    $queryc = "SELECT * FROM tbl_attendence where t_id='$tid'";
                    $resultc = mysqli_query($conn, $queryc);
                    $rowc = mysqli_fetch_array($resultc);
                    $total = $resultc->num_rows;
                    $total *= 2;
                    $cid = $rowc['id'];
                    $query2 = mysqli_query($conn, "SELECT count(*) as morng FROM tbl_attendence where t_id='$tid' AND forenoon='present'");
                    $query3 = mysqli_query($conn, "SELECT count(*) as evng FROM tbl_attendence where t_id='$tid' AND afternoon='present'");
                    $row2 = mysqli_fetch_assoc($query2);
                    $row3 = mysqli_fetch_assoc($query3);
                    $row2['morng'] += $row3['evng'];
                    $percent = $row2['morng'] / $total * 100;
                    echo "<tr><td>{$row['fname']} {$row['lname']}</td> <td>{$total}</td> <td>{$row2['morng']}</td> <td>{$percent}%</td>
                </tr>";
                }

                ?>
            </table>
        </div>
</body>

</html>