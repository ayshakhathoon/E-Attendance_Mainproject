

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="styles.css">
    <title>Teacher home</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        input[type=text], select {
            padding: 8px 16px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
        

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
                    <a href="../Teacher/takeattendance.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>Take attendance  </div>
      
                      
                    </a>
                </li>
                
                <li>
                    <a href="attendancereport.php">
                        <i class="fas fa-users"></i>
                        <div> Attendance Report</div>
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
</div>


<?php
	include "db_con.php";
	include "session.php";

	// $query = "SELECT tbl_class.class_name
	//     FROM tbl_teacher
	//     INNER JOIN tbl_class ON tbl_class.class_name = tbl_teacher.class_name
	
	//     Where tbl_teacher.t_id = '$_SESSION[adn_no]'";
	//     $rs = $conn->query($query);
	//     $num = $rs->num_rows;
	//     $rrw = $rs->fetch_assoc();


	// session and Term
    //$querey=mysqli_query($conn,"select * from tblsessionterm where isActive ='1'");
    //$rwws=mysqli_fetch_array($querey);
    //$sessionTermId = $rwws['Id'];

    // $date = date("Y-m-d");
    // $qurty=mysqli_query($conn,"select * from tbl_attendance  where class_name = '[class_name]' and date='$date'");
	// $count = mysqli_num_rows($qurty);

	// if($count == 0)//if Record does not exsit, insert the new record
	// // insert the students record into the attendance table on page load
	// $qus=mysqli_query($conn,"select * from tbl_stud  where class_name = '$_SESSION[adn_no]'");
	// while ($ros = $qus->fetch_assoc())
	// {
	// 	$qquery=mysqli_query($conn,"insert into tbl_attendance(adn_no,status,date) 
	// 	value('$ros'$_SESSION[adn_no]','0','$date')");
	// }


	
	

	 //if(!isset($_POST['save'])){
	 	//$stud_query= "SELECT * FROM tbl_stud WHERE class_name=(SELECT class_name from tbl_teacher WHERE t_id=".$_SESSION['adn_no'].")";
		//$rs = $conn->query($stud_query);
		//$num = $rs->num_rows;
		//if($num > 0)
	 	//{
		//while ($rows = $rs->fetch_assoc())
		//{
		//$check_attendance_res= mysqli_query($conn,"SELECT * FROM tbl_attendance WHERE adn_no=".$rows['adn_no']." AND date='$date'");
				//if(!$check_attendance_res || mysqli_num_rows($check_attendance_res) <= 0){
	 				//$qquery=mysqli_query($conn,"INSERT INTO tbl_attendance VALUES(null,".$rows['adn_no'].",'".$rows['class_name']."','0','$date')");
	 				//if($qquery){
				//echo "<script>console.log('".$conn->insert_id."');</script>";
			//	}
			//	}
				//else{
	 			//	echo "<script>alert('Attendances has been already taken for today !!');</script>";
				//	break;
			//}
	//	}
	//	}
	 //}

 	if(isset($_POST['save'])){
        $date = date("Y-m-d");
		$student_query_res= mysqli_query($conn,"SELECT * FROM tbl_stud WHERE class_name=(SELECT class_name from tbl_teacher WHERE t_id=".$_SESSION['adn_no'].")");
		if($student_query_res && mysqli_num_rows($student_query_res) > 0)
		{
			$i=1;
			$attendance_add_count=0;
			while($row = mysqli_fetch_array($student_query_res)){
				$check= isset($_POST['stud_check'.$i]) ? $_POST['stud_check'.$i] : null;
				$id= isset($_POST['stud_id'.$i]) ? $_POST['stud_id'.$i] : 0;
				$class_name= isset($_POST['stud_class_name'.$i]) ? $_POST['stud_class_name'.$i] : "null";


				$status= $check==null ? '0' : '1';
                $attend_add_res= mysqli_query($conn,"INSERT INTO tbl_attendance VALUES(null,".$id.",'".$class_name."','".$status."','".$date."')");
				if($attend_add_res && mysqli_affected_rows($conn) > 0){
					$attendance_add_count++;
				}
				$i++;
			}
			
			if($i==($attendance_add_count+1)){
				echo "<script>alert('Attendance taken successfully...');</script>";
			}
			else if($attendance_add_count){

			}
			else{
				echo "<script>alert('Attendance not compeleted !! Please try again !!');</script>";
			}
            
		}
    }
?>

                 
        <body>
        <form method="post" action="../Teacher/takeattendance.php">
                <h2>Take attendance</h2>
            <br><br> <br><br> <br><br>
            <center>
		<table id ="approve"  class="content-table" border="2">
                      <tr>
                         <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Admission No</th>
                        <th>Class_name</th>
                        <th>Check</th>
                      </tr>
                    
  
<?php
    // $query = "SELECT tbl_stud.adn_no,tbl_class.class_name As class_name,tbl_stud.fname, tbl_stud.lname FROM tbl_stud INNER JOIN tbl_class ON tbl_class.class_name = tbl_stud.class_name WHERE tbl_stud.adn_no = '".$_SESSION["adn_no"]."'";
	$stud_query= "SELECT * FROM tbl_stud WHERE class_name=(SELECT class_name from tbl_teacher WHERE t_id=".$_SESSION['adn_no'].")";
	$rs = $conn->query($stud_query);
    $num = $rs->num_rows;
    $sn=0;
    $status="";
    if($num > 0)
    {
      while ($rows = $rs->fetch_assoc())
        {
           	$sn = $sn+1;
          	echo"
            <tr>
              <td>".$sn."</td>
              <td>".$rows['fname']."</td>
              <td>".$rows['lname']."</td>
              <td>".$rows['adn_no']."</td>
              <td>".$rows['class_name']."</td>
              <td><input name='stud_check$sn' type='checkbox' class='form-control'></td>
            </tr>";
            echo "<input name='stud_id$sn' value=".$rows['adn_no']." type='hidden' class='form-control'><input name='stud_class_name$sn' value=".$rows['class_name']." type='hidden' class='form-control'>";
        }
    }
    else
    {
         echo   
         "<div class='alert alert-danger' role='alert'>
          No Record Found!
          </div>";
    }
    
    ?>
  </tbody>
</table><button type="submit" name="save" class="btn btn-primary">Take Attendance</button>
<br>
            </center>
</form>
</div>
</div>
</div>
</div>
</div>
  </body>
  </html>
     
      