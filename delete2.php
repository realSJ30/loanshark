<?php
		//mysql connection here
		include('dbConnection.php');
		$id = $_GET['id'];
    $msg = $_GET['msg'];
		$sql = "Delete FROM tbl_messages WHERE account_id =".$id." and feedback_message = '".$msg."'";
		$result = $mysqli->query($sql) or die ($sql);

		if($result){
			//echo "1 file is deleted.";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=messages.php\">";
		}
exit();
?>
