<?php
		//mysql connection here
		include('dbcon.php');
		$id = $_GET['id'];
		$sql = "Delete FROM person WHERE person.id ='$id'";

		$result = $dbconn->query($sql) or die ("Couldn't execute query.");
	
		if($result){
			//echo "1 file is deleted.";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=view.php\">";
		}
exit();
?>