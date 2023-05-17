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
    <title>Admin panel</title>
    <script>
        function PrintDiv() {
            var divToPrint = document.getElementById('divToPrint');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
            newWin.document.close();
            setTimeout(function () {
                newWin.close();
            }, 10);
        }
    </script>
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
        <div class="main">
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
                <a href="../Admin/index.php">Home</a>

                <p>From: </p>
                <input type="date" id="from" name="fromdate" required onchange="fromCheckDate()" max="<?php echo date('Y-m-d'); ?>"> &nbsp;
                <br><br>
                <p>To: </p>
                <input type="date" id="to" name="todate" required onchange="toCheckDate()" max="<?php echo date('Y-m-d'); ?>"> &nbsp;


                <button type="submit" name="date_submit">Search</button>
                <button onclick="PrintDiv()">Print Report</button>
                <script>
                    function fromCheckDate() {
                        var inputDate = document.getElementById("from").value;
                        var today = new Date().toISOString().split('T')[0];
                        if (inputDate > today) {
                            inputDate = today;
                        }
                    }
                    
                    function toCheckDate() {
                        var inputDate = document.getElementById("to").value;
                        var today = new Date().toISOString().split('T')[0];
                        if (inputDate > today) {
                            inputDate = today;
                        }
                    }
                </script>
                <!-- <div>
          <input type="button" class="btn btn-success" value="Print" onclick="PrintDiv();" />
        </div>-->
            </form>

            <table id="displaytb">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Forenoon</th>
                        <th>Afternoon</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //a.t_id,a.fname, b.date, b.attendance
                    if (isset($_POST['date_submit'])) {
                        $from_date = $_POST['fromdate'];
                        $to_date = $_POST['todate'];
                        $date_query = mysqli_query($conn, "SELECT * FROM tbl_teacher a INNER JOIN tbl_attendence b ON a.t_id = b.t_id AND b.date between '" . $from_date . "' AND '" . $to_date . "'");
                        if (mysqli_num_rows($date_query) > 0) {
                            while ($row = mysqli_fetch_array($date_query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['t_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['fname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['forenoon']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['afternoon']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['date']; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='4'>No records</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

            <div id="divToPrint" style="display:none;">
                <table border="2">


                    <tbody>
                        <thead>
                            <title>Attendance Report</title>
                            <tr>
                                <th>ID</th>
                                <th>Firstname</th>
                                <th>Forenoon</th>
                                <th>Afternoon</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <?php
                        if (isset($_POST['date_submit'])) {
                            $from_date = $_POST['fromdate'];
                            $to_date = $_POST['todate'];
                            $date_query = mysqli_query($conn, "SELECT * FROM tbl_teacher a INNER JOIN tbl_attendence b ON a.t_id = b.t_id AND b.date between '" . $from_date . "' AND '" . $to_date . "'");
                            if (mysqli_num_rows($date_query) > 0) {
                                while ($row = mysqli_fetch_array($date_query)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['t_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['fname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['forenoon']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['afternoon']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='4'>No records</td></tr>";
                            }
                        } else {
                            $date = date("Y-m-d");
                            $date_query1 = mysqli_query($conn, "SELECT * FROM tbl_teacher,tbl_attendence where tbl_attendence.t_id=tbl_teacher.t_id");
                            if (mysqli_num_rows($date_query1) > 0) {
                                while ($row1 = mysqli_fetch_array($date_query1)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row1['t_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['fname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['forenoon']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['afternoon']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row1['date']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='4'>No records</td></tr>";
                            }
                        }

                        ?>
                    </tbody>
                </table>
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