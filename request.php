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
                        while ($row = mysqli_fetch_array($gotresult)) {
                            ?><br>
                            <h3><span>WELCOME&nbsp;&nbsp;
                                    <?php echo $row['fname']; ?>&nbsp;
                                    <?php echo $row['lname']; ?>
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




            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="table-agile-info">

                        <div class="panel panel-default">
                            <div class="panel-heading"><br>
                                <center>
                                    <h2><b>Leave Request</b></h2>
                                </center><br>
                            </div>
                            <div>
                                <style>
                                    #approve {
                                        font-family: Arial, Helvetica, sans-serif;
                                        border-collapse: collapse;
                                        width: 70%;
                                        margin-left: 100px;
                                    }

                                    #approve td,
                                    #approve th {
                                        border: 1px solid #ddd;
                                        text-align: center;
                                        padding: 8px;
                                    }

                                    /* #builder tr:nth-child(even){background-color: #f2f2f2;} */

                                    #approve tr:hover {
                                        background-color: #ddd;
                                    }

                                    #approve th {
                                        padding-top: 12px;
                                        padding-bottom: 12px;
                                        text-align: center;
                                        background-color: grey;
                                        color: white;
                                    }
                                </style>
                                <?php
                                if (isset($_POST['acpt'])) {
                                    $lid = $_POST['acpt'];
                                    $update = mysqli_query($conn, "UPDATE `tbl_leave` SET `leavestatus`='1' WHERE `l_id` = '$lid'");
                                    if ($update) {
                                        // echo "<script>alert('Leave approved');</script>";
                                        echo "<script>window.location.href='request.php'</script>";
                                    }
                                }

                                if (isset($_POST['rjct'])) {
                                    $lid = $_POST['rjct'];
                                    $update = mysqli_query($conn, "UPDATE `tbl_leave` SET `leavestatus`='2' WHERE `l_id` = '$lid'");
                                    if ($update) {
                                        // echo "<script>alert('Leave rejected');</script>";
                                        echo "<script>window.location.href='request.php'</script>";
                                    }
                                }
                                ?>

                                <body>
                                    <style>
                                        td {
                                            height: 60px;
                                        }

                                        td button {
                                            width: 100px;
                                            height: 30px;
                                        }
                                    </style>
                                    <center>
                                        <table id="approve" class="content-table"
                                            style="float:center;margin-top:50px;padding:100px;">
                                            <tr>
                                                <thead>
                                                    <tr>
                                                        <th>SL NO</th>
                                                        <th>Adm. No.</th>

                                                        <th>Leave reason</th>

                                                        <th>Date</th>
                                                        <th>Action</th>
                                                        <!-- <th style="color:#F00">Status</th>-->

                                                    </tr>
                                                </thead>
                                    </center>
                                    <tbody>

                                        <tr>
                                            <?php
                                            include("db_con.php");
                                            ?>
                                            <?php
                                            $s = 1;


                                            // $sql = mysqli_query($conn, "SELECT * FROM `tbl_leave`;");
                                            

                                            // while ($display = mysqli_fetch_array($sql)) {
                                            
                                            $sql3 = mysqli_query($conn, "SELECT a.adn_no, a.fname, a.lname, c.reason, c.leavedate, c.l_id, c.leavestatus FROM `tbl_stud` a JOIN tbl_class b JOIN tbl_leave c ON a.class_name = b.id AND b.class_teacher = '$currentuser' AND c.adn_no = a.adn_no AND c.leavestatus = '0'");
                                            if (mysqli_num_rows($sql3) > 0) {
                                                while ($display3 = mysqli_fetch_assoc($sql3)) {
                                                    echo "<td>" . $s . "</td>";
                                                    echo "<td>" . $display3["adn_no"] . "</td>";

                                                    echo "<td>" . $display3["reason"] . "</td>";
                                                    echo "<td>" . date("d/m/Y", strtotime($display3["leavedate"])) . "</td>";
                                                    ?>
                                                    <td>
                                                        <?php
                                                        if ($display3["leavestatus"] == 1) {
                                                            echo "Approved";
                                                        }
                                                        if ($display3["leavestatus"] == 2) {
                                                            echo "Rejected";
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($display3["leavestatus"] == 0) {
                                                            ?>
                                                            <form action="" method="post">
                                                                <button type="submit" name="acpt"
                                                                    value="<?php echo $display3["l_id"]; ?>">Accept</button><br><br>
                                                                <button type="submit" name="rjct"
                                                                    value="<?php echo $display3["l_id"]; ?>">Reject</button>
                                                        </td>
                                                        </form>
                                                        <?php
                                                        } else {
                                                        }
                                                        echo "</tr>";
                                                        $s++;
                                                }
                                            }
                                            else{
                                            ?>

                                    </tbody>
                                    </table>
                                    <?php
    

        echo '<br>No leave requests';
    }
                                    ?>
                                    </center>
                            </div>
                        </div>
                        </form>
                    </div>
                </section>
                <!-- footer -->

                <!-- / footer -->
            </section>

            <!--main content end-->
            </section>
            <script src="js/bootstrap.js"></script>
            <script src="js/jquery.dcjqaccordion.2.7.js"></script>
            <script src="js/scripts.js"></script>
            <script src="js/jquery.slimscroll.js"></script>
            <script src="js/jquery.nicescroll.js"></script>
            <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
            <script src="js/jquery.scrollTo.js"></script>
        </body>

</html>
</div>
</div>
</body>

</html>