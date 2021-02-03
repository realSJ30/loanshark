<?php
	
	include('dbcon.php');
	$id = $_GET['id'];
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	
	
?>
<html>
<head>
<title>Edit Members</title>
</head>
<body>
	<?php
	
		include('dbcon.php');
		//$id= $_POST['id'];
		
		if($_POST['lastname']  == "" || is_numeric($_POST['lastname'])){
			echo "<script type=\"text/javascript\">window.alert(\"Please provide a valid lastname.\")</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=editPerson.php?id=$id;\">"; }	
		else if($_POST['firstname'] == "" || is_numeric($_POST['firstname'])){
			echo "<script type=\"text/javascript\">window.alert(\"Please provide a valid firstname.\")</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=editPerson.php?id=$id;\">"; }
		else if($_POST['address'] == "" ){
			echo "<script type=\"text/javascript\">window.alert(\"Please provide a valid address.\")</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=editPerson.php?id=$id;\">"; }
		else if($_POST['contact'] == "" ){
			echo "<script type=\"text/javascript\">window.alert(\"Please provide a valid contact Number .\")</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=editPerson.php?id=$id;\">"; }
		else{	
						//echo $firstname." - ". "$id"; 
						$query1 = "UPDATE person SET lastname = '$lastname', firstname = '$firstname', address = '$address' , contact = '$contact' WHERE id = '$id' ";
						$result = $dbconn->query($query1) or die ("Couldn't execute query.");
						//echo $query1;
			}
			
		if($result){
			//echo "1 file Edited.";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=view.php\">";
		}

	?>
</body>
</html>