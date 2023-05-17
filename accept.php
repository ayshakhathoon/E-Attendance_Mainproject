<?php 
include "db_con.php";
// include "session.php";

if (isset($_GET['l_id'])) {
	$l_id = $_GET['l_id'];


$sql="UPDATE `tbl_leave1` SET `leavestatus`=1 WHERE `l_id`='$l_id'";



	$result = $conn->query($sql);

	if ($result == TRUE) {
		?>
		<script>
		if(window.confirm('Accepted succesfully '))
		{
			window.location.href='../Admin/index.php';
		};
		</script>
		<?php
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?> 