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
                $sql = "SELECT * FROM `tbl_teacher` WHERE t_id='$currentuser'";
                $gotresult = mysqli_query($conn, $sql);
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
                    <a href="../Teacher/request.php">
                        <i class="fas fa-chart-bar"></i>
                        <div>Leave approval</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-info-circle"></i>
                        <div>Leave Apply</div>
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


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Attendance</title>

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

        </head>
        <form action="" method="post">
            <a href="..\Teacher\tindex.php">Home</a>

            <div style="margin-top:100px;margin-left:300px;">
                <p>From: </p>
                <input type="date" name="fromdate" id="expiry" required onchange="checkDate()"
                    max="<?php echo date('Y-m-d'); ?>"> &nbsp;
                <br><br>
                <p>To: </p>
                <input type="date" name="todate" required onchange="checkDate()"
                    max="<?php echo date('Y-m-d'); ?>"> &nbsp;


                <button type="submit" name="date_submit">Search</button>
                <div>
                    <button onclick="PrintDiv()">Print Report</button>

                </div>
                <script>
                    function checkDate() {
                        var inputDate = document.getElementById("expiry").value;
                        var today = new Date().toISOString().split('T')[0];
                        if (inputDate > today) {
                            document.getElementById("expiry").value = today;
                        }
                    }
                </script>
        </form>
    </div>
    <table>
        <center>
            <tbody>

                <th>First Name</th>
                <th>Class_name</th>
                <th>Date</th>
                <th>1st hour</th>
                <th>2nd hour</th>
                <th>3rd hour</th>
                <th>4th hour</th>
                <th>5th hour</th>
                <th>6th hour</th>
                <?php
                if (isset($_POST['date_submit'])) {
                    $from_date = $_POST['fromdate'];
                    $to_date = $_POST['todate'];
                    $date_query = mysqli_query($conn, "SELECT a.fname,a.class_name, b.* FROM tbl_stud a INNER JOIN tbl_attendance b ON a.adn_no = b.adn_no AND b.date between '" . $from_date . "' AND '" . $to_date . "'");
                    if (mysqli_num_rows($date_query) > 0) {
                        while ($row = mysqli_fetch_array($date_query)) {
                            ?>

                            <tr>


                                <td>
                                    <?php echo $row['fname']; ?>
                                </td>
                                <td>
                                    <?php echo $row['class_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['1st']; ?>
                                </td>
                                <td>
                                    <?php echo $row['2nd']; ?>
                                </td>
                                <td>
                                    <?php echo $row['3rd']; ?>
                                </td>
                                <td>
                                    <?php echo $row['4th']; ?>
                                </td>
                                <td>
                                    <?php echo $row['5th']; ?>
                                </td>
                                <td>
                                    <?php echo $row['6th']; ?>
                                </td>
                            </tr>
                            <?php

                        }
                    }
                } else {
                    echo "<p>No records</p>";
                }

                ?>
        </center>
        </tbody>
    </table>

    <div id="divToPrint" style="display:none;">
        <div style="width:200px;height:300px;background-color:teal;">
            <table border="1">
                <title>Attendance Report</title>


                <tbody>

                    <th>firstname</th>
                    <th>Class_name</th>
                    <th>Date</th>
                    <th>1st hour</th>
                    <th>2nd hour</th>
                    <th>3rd hour</th>
                    <th>4th hour</th>
                    <th>5th hour</th>
                    <th>6th hour</th>
                    <?php

                    if (isset($_POST['date_submit'])) {
                        $from_date = $_POST['fromdate'];
                        $to_date = $_POST['todate'];
                        $date_query = mysqli_query($conn, "SELECT a.fname,a.class_name, b.* FROM tbl_stud a INNER JOIN tbl_attendance b ON a.adn_no = b.adn_no AND b.date between '" . $from_date . "' AND '" . $to_date . "'");
                        if (mysqli_num_rows($date_query) > 0) {
                            while ($row = mysqli_fetch_array($date_query)) {

                                ?>
                                <tr>

                                <tr>


                                    <td>
                                        <?php echo $row['fname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['class_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['1st']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['2nd']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['3rd']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['4th']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['5th']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['6th']; ?>
                                    </td>
                                </tr>
                                <?php


                            }
                        }
                    } else {
                        echo "<p>No records</p>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        function PrintDiv() {
            var divToPrint = document.getElementById('divToPrint');
            var popupWin = window.open('', '_blank', 'width=300,height=300');
            popupWin.document.open();
            popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
        }

    </script>
    </div>




</body>

</html>