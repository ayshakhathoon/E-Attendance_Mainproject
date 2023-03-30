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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="styles.css">
    <style>
        
        .topbar .user p {
    margin: 0;
    font-size: 1re
    color: #299B63;

  
   /* Add this line */
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}
</style>

    </style>
    <title>Student home</title>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>E-ATTENDANCE</h2>
            </div>
            <div class="user">
                <?php
                $currentuser= $_SESSION['adn_no'];
                $sql="SELECT * FROM `tbl_stud` WHERE adn_no='$currentuser'";
                $gotresult=mysqli_query($conn,$sql);
                if($gotresult)
                {
                    if(mysqli_num_rows($gotresult) > 0)
                    {
                        while($row=mysqli_fetch_array($gotresult))
                        {
                            ?><br>
                           <h3><span>WELCOME&nbsp;&nbsp;<?php  echo  $row['fname'];?>&nbsp;<?php  echo  $row['lname'];?></span></h3>
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
                    <a href="../Student/home.php">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="Myprofile.php">
                        <i class="fas fa-user-graduate"></i>
                        <div>Update profile</div>
                    </a>
                </li>
                <li>
                    <a href="../Student/myattendance.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>View attendance</div>
                    </a>
                </li>
                <li>
                    <a href="attendancereport.php">
                        <i class="fas fa-users"></i>
                        <div>Attendance Report</div>
                    </a>
                </li>
                <li>
                    <a href="applyleave.php">
                        <i class="fas fa-chart-bar"></i>
                        <div>Apply Leave</div>
                    </a>
                </li>
                <li>
                  
                    <a href="leavestatus.php">
                        <i class="fa fa-info-circle"></i>
                        <div>Leave Status</div>
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
        <body>
<center>

<br><br><br>
        
        <?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the attendance data from the database
$currentuser= $_SESSION['adn_no'];
$sql = "SELECT adn_no, date, status FROM tbl_attendance WHERE  adn_no='$currentuser'";
$result = $conn->query($sql);


// Display the attendance data in a table
echo "<table>";

echo "<tr><th>student  ID</th><th>Date</th><th>Attendance Status</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["adn_no"] . "</td><td>". $row["date"] . "</td><td>" . $row["status"] . "</td></tr>";
}

echo "</table>";

// Close the database connection
$conn->close();
?>         
                   
              
</body>

</html>