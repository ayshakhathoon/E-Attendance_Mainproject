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
    <style>
        <style>.form-control {
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
    </style>
    <style>
        .topbar .user p {
            margin: 0;
            font-size: 1re color: #299B63;


            /* Add this line */
        }
    </style>
    <title>Student home</title>
</head>
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

        <div class="signup-form">

    <form class=" login-form" action="actionrequest.php" method="POST" autocomplete="off">
        <div class="form">
            <br><br>
            <h1>
                <center><b>Apply leave</b></center>
            </h1>
            <br>
            <div class="col-12 p-5">
                <div class="row">


                    <div class="col-12 p-5">
                        <div class="row">
                            <div class="col-12">
                                <label>Date: </label>
                                <input type="date" class="form-control" placeholder="date" name="date" required>
                            </div><br>
                            <div class="col-12">
                                <label>Half day/ Full day: </label>
                                <select name="day" id="day" class="form-control" required>
                                    <option value="" selected disabled>-Select Day-</option>
                                    <option value="Half day">Half day</option>
                                    <option value="Full day">Full day</option>
                                </select>
                            </div> <br>
                            <div class="col-12">
                                <label>Reason: </label>
                                <textarea name="leave" id="leave" placeholder="Enter a valid reason" cols="40" rows="4" class="form-control" required></textarea>
                            </div> <br>



                            <div class="inputfield">
                                <button type="submit" class="btn btn-primary" value="<?php echo $currentuser; ?>" name="leave_submit">Apply</button>
                            </div>
    </form>
</div>
</div>