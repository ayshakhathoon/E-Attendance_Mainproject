<?php
include "db_con.php";
include "session.php";
?>


<?php

$result = mysqli_query($conn,"SELECT a.*, b.* from tbl_stud a INNER JOIN tbl_attendance b ON a.adn_no=b.adn_no");

?>

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

<body>
<a href = "../Teacher/tindex.php">Home</a>
<?php
if(isset($_POST['date_submit'])){
    $date = $_POST['date'];
    $result= mysqli_query($conn,"SELECT a.*, b.* from tbl_stud a INNER JOIN tbl_attendance b ON a.adn_no=b.adn_no and b.date='$date'");
}

?>
	<form action="" method="post">
		<p>Select date: </p>
		<input type="date" name="date" required> &nbsp;
        <button type="submit" name="date_submit">Search</button>
        <br><br>

    </form>
		<table>
			<tr>

				<th> Name</th>
				<th>lname</th>
                <th>Adn_no</th>
				<th>Status</th>
				
				<th>Attendance date</th>
			</tr>
			<?php


			while ($row = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td>
						<?php echo $row['fname']; ?>
					</td>
					<td>
						<?php echo $row['lname']; ?>
					</td>
                    <td>
						<?php echo $row['adn_no']; ?>
					</td>
					<td>
						<?php echo $row['status']; ?>
					</td>
					
					<td>
						<?php echo $row['date']; ?>
					</td>




		</tr>
		<?php
			}
			?>
	</table>
</body>

</html> 
