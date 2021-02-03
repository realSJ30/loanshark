<?php
		//mysql connection here
    session_start();
		include('dbConnection.php');
		$id = $_GET['id'];
    $msg = $_GET['msg'];
    $rply = $_SESSION['admin_msg'];
		$sql = "update tbl_messages set admin_message ='".$rply."' WHERE account_id =".$id." and feedback_message = '".$msg."'";
		$result = $mysqli->query($sql) or die ($rply);

		//if($result){
			//echo "1 file is deleted.";
		//	echo "<meta http-equiv=\"refresh\" content=\"0;URL=messages.php\">";
		//}
exit();
?>
