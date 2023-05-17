<?php
include "db_con.php";
include "session.php";
?>
<?php
if(isset($_POST['update']))
{

$qualification = $_POST['qualification'];
$dob = $_POST['dob'];

$gender = $_POST['gender'];
$address = $_POST['address'];


$phone = $_POST['phone'];
$password = $_POST['password'];
$abc=md5($_POST['password']);
//  $email = $_POST['email'];
$currentuser= $_SESSION['adn_no'];

$newp = "UPDATE `tbl_teacher` SET `qualification`='$qualification',`dob`='$dob',`gender`='$gender',`address`='$address' ,`password`='$abc'WHERE `t_id`='$currentuser'";
$runnewp = mysqli_query($conn, $newp);

echo '<script>alert("Profile updated.");</script>';
echo '<script>window.location.href="updateprofilet.php";</script>';
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
    <title>Student home</title>
</head>


<style>
        
        .topbar .user p {
    margin: 0;
    font-size: 1re
    color: #299B63;

  
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
	background-image: url('pic1.jpg');
  background-repeat: no-repeat;
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
input {
  width: 100%;
}
select {
  width: 100%;
}
.action {
    font-size: 15px;
	font-weight: bold;		
	min-width: 140px;
  color:#5cb85c;
	outline: none !important;
  display: flex;
  justify-content: center;
  align-items: flex-end;
  height: 5vh; /* adjust this value to fit your needs */
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
  opacity:1;
}
    </style>
</head>
        <body>
        <div class="signup-form">
        


                                            
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
			?>
		<div class="signup-form">
        	
      <form action="" method="post"  >
        <h2><b>Update profile</b></h2>
          <br>
  <div class="input-group" > 
 
    <div class="row">
	
     <!-- <label>First  Name</label>
      
      <input type="hidden"  name="fname" placeholder="Enter first name" id="fname" value="<?php echo $row['fname'];?>"  >
      <span id="fn" style="color: red;"></span>

</div>
<div class="col-12 ">
<label>Last  Name</label>
      <input type="hidden"  name="lname" id="lname" placeholder="Enter last name"  value="<?php echo $row['lname'];?>"  >
      <span id="ln" style="color: red;"></span>
</div>

<div class="col-12" required />-->

      <label>Qualification</label>
        
      <select name="qualification" class="form-control" required>
    <option value="none" selected>Qualification</option>
    <option value="Mca">Mca</option>
    <option value="Mtech">Mtech</option>
    <option value="PhD">phD</option>
</select>

     


</div>
    
      <div class="input-group"  >
          <label>Date of Birth</label>
            <input type="date"  class="form-control" name="dob" placeholder="Enter date of birth" id="dob"  required>
            <span id="bh" style="color: red;"></span>
      </div>  
      <div class="input-group" >
      <label>Gender</label>
        
<select name="gender"   class="form-control"  required>
	<option value="none" selected>Gender</option>
	<option value="male">Male</option>
	<option value="female">Female</option>
	
</select>
  </div>
 
        
<div class="input-group" >
      <label>Address</label>
            <input type="text"class="form-control"  name="address" placeholder="Enter address" id="address" required onkeyup="return ValidateAddress()" onblur="return ValidateAddress()"> 
			<span id="ad" style="color: red;"></span>
</div>
     
      
            <div class="input-group">
               <label>Phone Number</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter phone" id="tel"  title="Please enter a valid phone number"  required onkeyup="return validatePhone()" onblur="return ValidatePhone()" minlength="10" maxlength="10" >
           
                 <span id="pe" style="color: red;"></span>
           </div>
           <div class="input-group">
             <label>Password</label>
            <input type="password"  class="form-control" name="password" id="password" placeholder="Password"  required/>
              <span id="pss" style="color: red;"></span>
           </div>

              
              <style>
                                                 /* The message box is shown when the user clicks on the password field */
                                                    #message {
                                                    display:none;
                                                    background:#fff;
                                                    color: #000;
                                                    position: relative;
                                                    padding: 20px;
                                                    margin-top: 10px;
                                                    }
                                                                        #message p {
                                                    padding: 1px 35px;
                                                    font-size: 14px;
                                                    }
                                                    /* Add a green text color and a checkmark when the requirements are right */
                                                    .valid {
                                                    color: green;
                                                    }

                                                    .valid:before {
                                                    position: relative;
                                                    left: -25px;
                                                    content: "✔";
                                                    }

                                                    /* Add a red text color and an "x" when the requirements are wrong */
                                                    .invalid {
                                                    color: red;
                                                    }

                                                    .invalid:before {
                                                    position: relative;
                                                    left: -25px;
                                                    content: "✖";
                                                    }
                                                    </style>
                                                <div id="message">
<!--                                                    <h4 style="color:rgb(249, 164, 61) ;">Password must contain the following:</h4>-->
                                                        <p id="letter" class="invalid">A lowercase letter</p>
                                                        <p id="capital" class="invalid">A capital (uppercase) letter</p>
                                                        <p id="number" class="invalid">A number</p>
                                                        <p id="length" class="invalid">Minimum 8 characters</b></p>
                                                     </div>
                                                <script>
                                        var myInput = document.getElementById("password");
                                        var letter = document.getElementById("letter");
                                        var capital = document.getElementById("capital");
                                        var number = document.getElementById("number");
                                        var length = document.getElementById("length");
                                        myInput.onfocus = function() {
                                        document.getElementById("message").style.display = "block";
                                        }
                                        myInput.onblur = function() {
                                        document.getElementById("message").style.display = "none";
                                        }
                                        // When the user starts to type something inside the password field
                                        myInput.onkeyup = function() {
                                        // Validate lowercase letters
                                        var lowerCaseLetters = /[a-z]/g;
                                        if(myInput.value.match(lowerCaseLetters)) {
                                            letter.classList.remove("invalid");
                                            letter.classList.add("valid");
                                        } else {
                                            letter.classList.remove("valid");
                                            letter.classList.add("invalid");
                                        }

                                        // Validate capital letters
                                        var upperCaseLetters = /[A-Z]/g;
                                        if(myInput.value.match(upperCaseLetters)) {
                                            capital.classList.remove("invalid");
                                            capital.classList.add("valid");
                                        } else {
                                            capital.classList.remove("valid");
                                            capital.classList.add("invalid");
                                        }

                                        // Validate numbers
                                        var numbers = /[0-9]/g;
                                        if(myInput.value.match(numbers)) {
                                            number.classList.remove("invalid");
                                            number.classList.add("valid");
                                        } else {
                                            number.classList.remove("valid");
                                            number.classList.add("invalid");
                                        }

                                        // Validate length
                                        if(myInput.value.length >= 8) {
                                            length.classList.remove("invalid");
                                            length.classList.add("valid");
                                        } else {
                                            length.classList.remove("valid");
                                            length.classList.add("invalid");
                                        }
                                        }
                                    </script>
                                      
          <div class="input-field">
          <label>Confirm Password</label>
            <input type="password" name="cpassword" class="form-control" placeholder="confirm password"  id="cpassword"  required onkeyup="return Confirmpass()" onblur="return Confirmpass()" >
            <span id="cpss" style="color: red;"></span>

          
          
          </div><br><br>
          <div class="action">
      <button type="submit" class="registerbtn" name="update"><b>Update<b></button>
                                    </div>
                                   

      
      <div class="abcd">
      <a href="../Student/home.php">Back to home</a>
                                    </div>
    </div>
                                    </form>
   
      

        
          <!-- <a href="#" class="link">Forgot Your Password?</a>  -->
        
      
    </div>
      
    </div>
    
    <!-- partial -->
    <!-- <script  src="./script.js"></script> -->
           
<script type="text/javascript">
function Validate() 
                            {
                            var val = document.getElementById('fname').value;
                            if (!val.match(/^[A-Z].*$/)) 
                            {
                              document.getElementById('fn').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('fname').value = val;
                                    document.getElementById('fname').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(val.length<3||val.length>30){
                              document.getElementById('fn').innerHTML="Between 3 to 10 characters";
                                    document.getElementById('fname').value = val;
    
    
                                document.getElementById('fname').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                             document.getElementById('fn').innerHTML=" ";
                              document.getElementById('fname').style.color = "green";
                             return true;
                            }
                          }
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
                               document.getElementById('ln').innerHTML="Between 3 to 10 characters";
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
                            
                          function ValidateEmail()
                            {
                         
                              var email=document.getElementById('email').value;  
                              var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                            //var atposition=x.indexOf("@");  
                            //var dotposition=x.lastIndexOf(".");  
                           
                              if(email.length<3||email.length>30){
                                document.getElementById('el').innerHTML="Invalid Email";
                                    document.getElementById('email').value = email;
                                    document.getElementById('email').style.color = "red";
                                   // alert("err");
                                      return false;
                              }
                             if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){  
                                document.getElementById('el').innerHTML="Please enter a valid Email";  
                                document.getElementById('email').value = email;
                                    document.getElementById('email').style.color = "red";
                              return false;  
                              }
                              else{
                              document.getElementById('el').innerHTML=" ";
                              document.getElementById('email').style.color = "green";
                             return true;
    
                              
                            }
                          }
                             function Validatepassword()
                             {
                          
                              var pass=document.getElementById('password').value;
                              var patt="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
                              if (pass.length<8)
                               if(!pass.match(/[a-z]/g)){
                                document.getElementById('password').value = pass;
                                 document.getElementById('cpss').innerHTML="Enter a strong password eg:Aa#23gh56";
                                  document.getElementById('password').style.color="red";
                                  return false;
                                }
                                if(!pass.match(/[A-Z]/g)){
                                  document.getElementById('password').value = pass;
                                   document.getElementById('passwordError').innerHTML="Include minimum one capital letter";
                                 document.getElementById('password').style.color="red";

                                     return false;
                                }
                                if(!pass.match(/[0-9]/g)){
                                  document.getElementById('password').value = pass;
                                  document.getElementById('passwordError').innerHTML="Include 1 digit";
                                document.getElementById('password').style.color="red";

                                return false;
                                 }
                              if(!pass.match(/[^a-zA-Z\d]/g)){
                                document.getElementById('password').value = pass;
                                document.getElementById('passwordError').innerHTML="Include 1 special character";
                              document.getElementById('password').style.color="red";

                              return false;
                                 }
                            if(pass.length < 8){
                              document.getElementById('password').value = pass;
                               document.getElementById('passwordError').innerHTML="Minimum 8 characters";
                              document.getElementById('password').style.color="red";

                              return false;
                            }
                              else{
                                document.getElementById('password').value = pass;

                                 document.getElementById('passwordError').innerHTML="";
                                document.getElementById('password').style.color = "green";
                              }
                           
                               
                          }
                          function Confirmpass()
                             {
                          
                              var pass1=document.getElementById('password').value;
                              var pass2=document.getElementById('cpassword').value;
                               if (pass1!=pass2)
                                        {
                                 document.getElementById('cpss').innerHTML="Password doesn't match ";  
                                document.getElementById('cpassword').value = pass2;
                                document.getElementById('cpassword').style.color = "red";
                              return false;  
                              }
                           
                              else{
                              document.getElementById('cpss').innerHTML=" ";
                              document.getElementById('cpassword').style.color = "green";
                            return true;
                              
                            }
                          }
                          function ValidatePhone(){
                            var mobile=document.getElementById('tel').value;
                            if(!mobile.match(/^[6789][0-9]{9}$/)){
                             document.getElementById('pe').innerHTML="Enter a valid phone number";
                            document.getElementById('tel').style.color="red";
                           return false;
                           }
                          else{
                          document.getElementById('pe').innerHTML=" ";
                          document.getElementById('tel').style.color="green";
                          return true;
}
}
                          
function ValidateAddress(){
  var address = document.getElementById('address').value;
                            if (!address.match(/^[a-zA-Z ]*$/)) 
                            {
                              document.getElementById('ad').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                    document.getElementById('address').value = address;
                                    document.getElementById('address').style.color = "red";
                                      return false;
                                     flag=1;
                            }
                            if(address.length<3||address.length>30){
                               document.getElementById('ad').innerHTML="Between 3 to 10 characters";
                                    document.getElementById('address').value = address;
    
    
                                document.getElementById('address').style.color = "red";
                                      return false;
                                      
                            }
                            else{
    
                            
                              document.getElementById('ad').innerHTML=" ";
                              document.getElementById('address').style.color = "green";
                             return true;
                            }
}
function Val()
                            {
                              if(Validate()===false || ValidateEmail()===false || Validatepassword()===false || Confirmpass()===false || ValidatePhone()===false)
                              {
                                return false;
                              }
                            }
                            

    
                            
                            
                            
    
                            
                
                            
                            
  </script>
  </body>
</html>

      </div><br>
      <button type="submit" name="update">Update</button>
          
</div>
        <!-- print_r($row['adn_no']);

        print_r($row['fname']);
        print_r($row['lname']);
        print_r($row['email']); -->
<?php
        }
    
}

            ?>
            <tr>
                                                
    
                                           
                                    
                                            
         
                                                
                                                
                                                
                                                
                                             
                                               
                                            
                                       
                                        <?php
                                        }
                                        ?>
                                         </table>
                                        </div>   
                                        </body>                                                             
      
                   
              
</body>

</html>