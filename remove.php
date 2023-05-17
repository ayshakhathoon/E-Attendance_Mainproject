<?php 
include "db_con.php";
include "session.php";

if (isset($_GET['l_id'])) {
	$l_id = $_GET['l_id'];


$sql="UPDATE `tbl_leave` SET `leavestatus`=0 WHERE `l_id`='$l_id'";

	$result = $conn->query($sql);

	if ($result == TRUE) {
		?>
		<script>
		if(window.confirm('removed succesfully '))
		{
			window.location.href='thome.php';
		};
		</script>
		<?php
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}

?> 