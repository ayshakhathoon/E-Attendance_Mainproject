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
tr {
    width:0.2px ;
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
<br>
<center>
<form action="" method="post">
<br><br>

		<p>From: </p>
		<input type="date" name="fromdate" required> &nbsp;
        <br><br>
        <p>To: </p>
        <input type="date" name="todate" required> &nbsp;
        
        
        <button type="submit" name="date_submit">Search</button>
        <div>
        <button onclick="PrintDiv()">Print Report</button>
  
</div>

    </form>
    <center>
    <table>
    <tbody>
  
        <th>First Name</th>
        <th>Class_name</th>
        <th>Date</th>
        <th>Status</th>
        <?php
		if (isset($_POST['date_submit'])) {
			$from_date = $_POST['fromdate'];
			$to_date = $_POST['todate'];
            $currentuser= $_SESSION['adn_no'];
			$date_query = mysqli_query($conn, "SELECT a.fname,a.class_name, b.date, b.status FROM tbl_stud a INNER JOIN tbl_attendance b ON a.adn_no = b.adn_no AND a.adn_no = '{$_SESSION['adn_no']}' AND b.date between '" . $from_date . "' AND '" . $to_date . "'");
			if (mysqli_num_rows($date_query) > 0) {
				while ($row = mysqli_fetch_array($date_query)) {
		?>


                          <tr>
						 
                       
                            <td><?php echo $row['fname'];?></td>
                            <td><?php echo $row['class_name'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['status'];?></td>
                          </tr>
                         <?php
                        
			  }
            }
        }else{
            echo "<p>No records</p>"; 
        }
              
?> 
 
 </tbody>
    </center>
 </table>
 
 <div id="divToPrint" style="display:none;">
  <div style="width:200px;height:300px;background-color:green;">
  <table>
    <title>Attendance Report</title>
   
  <style>
#approve {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #approve td, #approve th {
        border: 1px solid #ddd;
        padding: 4px;
        }

        /* #builder tr:nth-child(even){background-color: #f2f2f2;} */

        #approve tr:hover {background-color: #ddd;}

        #approve th {
            padding-right: 10px;
        padding-top: 4px;
        padding-bottom: 4px;
        text-align: center;
        background-color: royalblue;
        color: white;
        }
        </style>
    <tbody>
       
        <th>firstname</th>
        <th>Class_name</th>
        <th>Date</th>
        <th>Status</th>
        <?php
		if (isset($_POST['date_submit'])) {
			$from_date = $_POST['fromdate'];
			$to_date = $_POST['todate'];
            $currentuser= $_SESSION['adn_no'];
            
			$date_query = mysqli_query($conn, "SELECT a.fname,a.class_name, b.date, b.status FROM tbl_stud a INNER JOIN tbl_attendance b ON a.adn_no = b.adn_no AND a.adn_no = '{$_SESSION['adn_no']}' AND b.date between '" . $from_date . "' AND '" . $to_date . "'");
			if (mysqli_num_rows($date_query) > 0) {
				while ($row = mysqli_fetch_array($date_query)) {
		?>

					<tr>


						<td><?php echo $row['fname']; ?></td>
						<td><?php echo $row['class_name']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['status']; ?></td>
					</tr>
				<?php

				}
			} else {
				echo "<p>No records</p>";
			}
		} else {
			echo "<p>No records</p>";
		}

		?>

	</tbody>
    </center>
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

