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

       
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <title>Status</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <br><br>
                    <h2 class="heading-section">Leave Status</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-striped">
                            <style>
                                #approve {
                                    font-family: Arial, Helvetica, sans-serif;
                                    border-collapse: collapse;
                                    width: 100%;
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

                            <body>
                                <table id="approve" class="content-table">

                                    <tr>
                                        <thead>
                                            <tr>
                                                <th data-breakpoints="xs"></th>
                                                <th>Adn_no</th>

                                                <th>Reason</th>
                                                <th>Date</th>

                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                include("db_con.php");

                                                $user = $_SESSION['adn_no'];
                                                ?>
                                                <?php
                                                $s = 1;
                                                $currentuser = $_SESSION['adn_no'];
                                                $sq = mysqli_query($conn, "SELECT t_id FROM `tbl_teacher` where t_id = '$currentuser'");
                                                $disp = mysqli_fetch_array($sq);


                                                $sql = mysqli_query($conn, "SELECT * FROM `tbl_leave1` where t_id= '$currentuser'");


                                                while ($display = mysqli_fetch_array($sql)) {

                                                    echo "<td>" . $s++ . "</td>";
                                                    $sql3 = mysqli_query($conn, "SELECT * FROM `tbl_teacher` WHERE `t_id` = " . $display['t_id']);
                                                    $display3 = mysqli_fetch_array($sql3);
                                                    echo "<td>" . $display['t_id'] . "</td>";


                                                    echo "<td>" . $display["reason"] . "</td>";
                                                    echo "<td>" . $display["leavedate"] . "</td>";
                                                   ;
                                                    //echo $display['leavestatus'];
                                                    if ($display['leavestatus'] == 2) {
                                                        echo "<td>rejected</td>";
                                                    } else if ($display['leavestatus'] == 0) {
                                                        echo "<td>pending</td>";
                                                    } else if ($display['leavestatus'] == 1) {
                                                        echo "<td>approved</td>";
                                                    }
                                                    //echo "<td><a style='color:#090' href='deleteprod.php?prod_id=".$display['prod_id']."'>Active/InActive</a> </td>";
                                                
                                                    echo "</tr>";

                                                }

                                                echo "</table>";

                                                ?>
                                            </tr>
                                        </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>