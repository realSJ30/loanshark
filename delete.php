<?php
		//mysql connection here
		include('dbConnection.php');
		$id = $_GET['id'];
		$sql = "Delete FROM tbl_account WHERE account_id =".$id;
		//remove all transaction with that account//
		$sql_1 = "delete from tbl_transaction where account_id = ".$id;
		$result_1 = $mysqli->query($sql_1);
		$sql_2 = "delete from tbl_messages where account_id = ".$id;
		$result_2 = $mysqli->query($sql_2);

		$result = $mysqli->query($sql) or die ("Couldn't execute query.");

		if($result){
			//echo "1 file is deleted.";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=superadmin.php\">";
		}
exit();
?>
