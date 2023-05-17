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
    <title>Student home</title>
    <style>
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
</head>


<style>
        
        .topbar .user p {
    margin: 0;
    font-size: 1re
    color: #299B63;

  
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
                $currentuser= $_SESSION['adn_no'];
                $sql="SELECT * FROM `tbl_teacher` WHERE t_id='$currentuser'";
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
                        <div>Attendance  </div>
      
                      
                    </a>
                </li>
              
                <li>
                    <a href="../Teacher/t.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>Take attendance  </div>
      
                      
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
</div>         
                   
              
<body>
<center>
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
                
                $query = "SELECT * FROM tbl_teacher  where t_id='$currentuser'";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                    $tid = $row['t_id'];
                    $queryc = "SELECT * FROM tbl_attendence where t_id='$currentuser'";
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

<br><br><br>

<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the attendance data from the database
$currentuser= $_SESSION['adn_no'];
$sql = "SELECT * FROM tbl_attendence WHERE  t_id='$currentuser'";
$result = $conn->query($sql);


// Display the attendance data in a table
echo "<table>";

echo "<tr> <th>teacher  ID</th> <th>Date</th><th>Forenoon</th><th>Afternoon</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["t_id"] . "</td><td>" . $row["date"] . "</td><td>" . $row["forenoon"] ."</td><td>". $row["afternoon"] ."</td></tr>";
}

echo "</table>";

// Close the database connection
$conn->close();
?>
