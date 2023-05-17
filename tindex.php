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
        margin: 40px;
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

            <div class="user">
                <?php
                $currentuser = $_SESSION['adn_no'];
                $sql = "SELECT * FROM `tbl_teacher` WHERE t_id='$currentuser'";
                $gotresult = mysqli_query($conn, $sql);
                if ($gotresult) {
                    if (mysqli_num_rows($gotresult) > 0) {
                        while ($row1 = mysqli_fetch_array($gotresult)) {

                            ?>
                            <h4><span>WELCOME,&nbsp;
                                    <?php echo $row1['fname']." ".$row1['lname']; ?>
                                </span></h4>
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
                </li>
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

        <div class="main">
            <?php
            // echo $currentuser;
            $query = mysqli_query($conn, "SELECT a.*, b.stream, c.batch, d.course FROM tbl_class a JOIN tbl1_stream b JOIN tbl1_batch c JOIN tbl1_course d
            ON a.course = d.c_id AND b.str_id = a.stream_name AND c.b_id = a.batch AND a.class_teacher = '$currentuser'");
            $clz = mysqli_fetch_assoc($query);
            ?>
            <div style="margin-top:30px;">
            <span style="margin-left:40px;">Class:<strong style="color:red;"> <?php echo $clz["stream"]." ".$clz["course"]." ".$clz["from"]." - ".$clz["to"]." ".$clz["batch"]; ?></strong>
            </div>
            <table id="approve" class="content-table" border="1">
                <tr>
                    <th>Sl. No.</th>
                    <th>Name</th>
                    <!-- <th>Class Name</th> -->
                    <!-- <th>Phone</th> -->
                </tr>
                <?php

                $queryc = "SELECT * FROM tbl_class where class_teacher='$currentuser'";
                $resultc = mysqli_query($conn, $queryc);
                $rowc = mysqli_fetch_array($resultc);
                $cid = $rowc['id'];

                $query = "SELECT * FROM tbl_stud where class_name='$cid' ORDER BY adn_no ASC";
                $result = mysqli_query($conn, $query);
                $i=1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr><td>{$i}</td>   <td>{$row['fname']} {$row['lname']}</td>
                </tr>";$i++;
                }

                ?>
            </table>
        </div>
</body>

</html>