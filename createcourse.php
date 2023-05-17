<?php
include "db_con.php";
include "session.php";
?>
<?php
include 'db_con.php';
if(isset($_POST['submit'])){
  $course_name = $_POST['course_name'];

$sql=mysqli_query($conn,"INSERT INTO `tbl1_course`(`course`) VALUES('$course_name')");

    
    
    
if($sql)
  {
   
echo "<script>alert('course Registered Successfully!!');window.location='../Admin/createcourse.php'</script>";
  }
else
  {
echo "<script>alert('Error');window.location='../Admin/createcourse.php'</script>";
  }
}
if(isset($_POST['strsub'])){
    $stream_name = $_POST['stream_name'];
  $course=$_POST['course'];
  $sem=$_POST['sem'];
  $sql1=mysqli_query($conn,"INSERT INTO `tbl1_stream`(`c_id`,`stream`,`sem`) VALUES('$course','$stream_name','$sem')");
  
      
      
      
  if($sql1)
    {
     
  echo "<script>alert('Stream Registered Successfully!!');window.location='../Admin/createcourse.php'</script>";
    }
  else
    {
  echo "<script>alert('Error');window.location='../Admin/createcourse.php'</script>";
    }
  }
  if(isset($_POST['str'])){
    $course = $_POST['cid'];
    $stream = $_POST['sid'];
  $batch=$_POST['batch_name'];
  $sql1=mysqli_query($conn,"INSERT INTO `tbl1_batch`(`c_id`, `str_id`, `batch` ) VALUES('$course','$stream','$batch')");
  
      
      
      
  if($sql1)
    {
     
  echo "<script>alert('Batch Registered Successfully!!');window.location='../Admin/createcourse.php'</script>";
    }
  else
    {
  echo "<script>alert('Error');window.location='../Admin/createcourse.php'</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="styles.css">
    <title>Admin panel</title>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<style>
      
      .form-control {
	height: 40px;
	box-shadow: none;
	color: #5cb85c;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
  border-radius: 8px;
  color: #299b63;
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
.signup-form h2:before, .signup-form h2:after {
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
	color:  #299b63;
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
	font-size: 15px;
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
	outline: none !important;
  display: flex;
  justify-content: center;
  align-items: flex-end;
  height: 5vh; /* adjust this value to fit your needs */
}
.abcd{
    display: flex;
  justify-content: center;
  align-items: flex-end;
}

button[type="submit"] {
  margin-bottom: 0.5vh; /* adjust this value to fit your needs */
}
</style>
<style>
        #admin-heading {
  display: inline;
  
}
    </style>
</head>


    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>E-ATTENDANCE</h2>
            </div>
           <!-- <div class="search">
                <input type="text" name="search" placeholder="search here">
                <label for="search"><i class="fas fa-search"></i></label>
            </div>-->
            <h4 id="admin-heading"  style="text-align: right;">Welcome Admin</h4> 

            
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
                        <div>View  </div>
      
                      
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
      
        <body>
        <div class="signup-form">
        <form action="" method="post" onsubmit="return()">
        <br>
        <h2>Add Course</h2>
        <label>Course</label>
      
      <input type="text"class="form-control"  name="course_name" placeholder="Enter course_name" id="lname" onkeyup="return Validatename()" required/ >
      <span id="ln" style="color: red;"></span><br>
<br><div class="action">
    <button type="submit" name="submit" ><b>REGISTER</b></button><br>
</div>
</form>
<form action="" method="post" onsubmit="return()">
        
        <h2>Add Stream</h2>
        <label>Course</label>
      <select id="course" name="course" class="form-control">
        <option value="" hidden>--select--</option>
      <?php
                                $sql = mysqli_query($conn, "select * from tbl1_course");
                                while ($row = mysqli_fetch_array($sql)) {
                                    // check if the current row is not equal to the selected value from the first dropdown
                                        ?>
                                        <option value="<?php echo $row['c_id'] ?>"><?php echo $row['course'] ?></option>
                                        <?php
                                    }
                                
                                ?>
</select><br><br>
<label>Stream</label>
<input type="text" class="form-control"  name="stream_name" placeholder="Enter stream_name" id="stream" onkeyup="return Validatestream()" required/ >
      <span id="lnl" style="color: red;"></span><br>
      <br><label>Semester</label>
      <input type="number" class="form-control"  name="sem" placeholder="Enter no:of Semester" id="sem" onkeyup="return Validatesem()" required/ >
      <span id="lns" style="color: red;"></span><br>
<br><div class="action">
    <button type="submit" name="strsub" ><b>REGISTER</b></button><br>
</div>
</form>
    <div class="abcd">
<a href="../Admin/index.php">Back to home</a>
<script type="text/javascript">
      function Validatename() 
                          {
                            var val = document.getElementById('lname').value;
                            if (!val.match(/^[A-Z].*$/)) 
                            {
                              document.getElementById('ln').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('lname').value = val;
                                    document.getElementById('lname').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(val.length<3||val.length>30){
                               document.getElementById('ln').innerHTML="Between 3 to 50 characters";
                                    document.getElementById('lname').value = val;
    
    
                                document.getElementById('lname').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                               document.getElementById('ln').innerHTML=" ";
                              document.getElementById('lname').style.color = "green";
                             return true;
                            }
                          }
      
                          function Validatestream() 
                          {
                            var val = document.getElementById('stream').value;
                            if (!val.match(/^[A-Z].*$/)) 
                            {
                              document.getElementById('lnl').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('stream').value = val;
                                    document.getElementById('stream').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(val.length<3||val.length>30){
                               document.getElementById('lnl').innerHTML="Between 3 to 50 characters";
                                    document.getElementById('stream').value = val;
    
    
                                document.getElementById('stream').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                               document.getElementById('lnl').innerHTML=" ";
                              document.getElementById('stream').style.color = "green";
                             return true;
                            }
                          }          
      </script>
      <form action="" method="post" onsubmit="return()">
        <br>
        <h2>Add Batch</h2>
        <div class="form-group">
                        <div class="row">
                            <label for="course">Course:</label>


                            <select name="cid" id="cid" onInput="chek()" required>
                                <option value="">--select--</option>
                                <?php
                                $sql = mysqli_query($conn, "select * from tbl1_course");
                                while ($row = mysqli_fetch_array($sql)) {

                                    ?>
                                    <option value="<?php echo $row['c_id'] ?>"><?php echo $row['course'] ?></option>

                                    <?php

                                }
                                ?>

                            </select>

                            <?php



                            // $sql1 = mysqli_query($conn, "select * from tbl1_stream");
                            ?>
                            <div class="form-group">
                                <br> <label>Stream Name</label>


                                <select name="sid" id="sid" onInput="chek1()" required>
                                    <option value="">--Select Stream--</option>
                                </select><br>
                            </div>

                            <div class="form-group">

                                <label for="semester">semester</label>
                                <select name="semid" id="semid" required>
                                    <option value="">--Select Stream--</option>
                                </select><br>
                            </div>

                            <br>
                            <label>Batch</label>
<input type="text" class="form-control"  name="batch_name" placeholder="Enter batch_name" id="stream" required >
      <span id="lnl" style="color: red;"></span><br>
      <label for="class">Class:</label>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "attendancenew");
                            $sql = mysqli_query($conn, "select * from tbl_class");
                            ?>
                            <select name="class" id="class" class="form-control" onInput="classcheck()">
                                <option value="" selected disabled>Select Class</option>
                                <?php
                                while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <option value="<?php echo $row[0] ?>"><?php echo $row[1]."-".$row[2]." ".$row[6] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div><br>
      <br><div class="action">
    <button type="submit" name="str" ><b>REGISTER</b></button><br>
</div>
</form>

<script type="text/javascript">
            function chek() {
                jQuery.ajax({
                    url: "get_stream.php",
                    type: "post",
                    data: "cid=" + $("#cid").val(),
                    success: function (dataResult) {
                        $("#sid").html(dataResult);
                    }
                });
            }

            function chek1() {
                jQuery.ajax({
                    url: "a.php",
                    type: "post",
                    data: "sid=" + $("#sid").val(),
                    success: function (dataResult) {
                        $("#semid").html(dataResult);
                    }
                });
            }

     
                                    
     
      <?php

?>

</script>
</body>

</html>
  