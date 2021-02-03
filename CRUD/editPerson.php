
<html>
<head>
<style>

body{
margin: 50px 350px 20px 350px;
}

div#welcome{

border: 1px solid purple;
}
</style>

	<?php
		//mysql connection here
		include('dbcon.php');
		$id = $_GET['id'];
		$sql = "SELECT * FROM person WHERE id ='$id'";

		$result = $dbconn->query($sql);
		//echo $sql;
		$row = $result->fetch_assoc()
	?>
</head>
<body>

<div >
				
	<form name="form" method="post" action="saveEditPerson.php?id=<?php echo $id;?>">
		<?php $lastname=""; $firstname=""; $address=""; $contact=""; ?>
		<fieldset style="border: 1px purple solid">
			<legend style="color:purple; font-size: 20px;" align="center" > Edit Information</legend>
				
				<?php $firstname=""; $lastname=""; $address=""; $contact=""; ?>
				<table align="center" cellspacing="10px">
					<tr >
						<td><label for="first-name">ID</label> </td>
						<td> <?php echo $row['id'] ?></td>	
					</tr>
					<tr >
						<td>Firstname: </td>
						<td><input type="text" name="firstname" id="firstname" value="<?php echo $row['firstname'];?> " size="20"></td>	
					</tr>
					<tr >
						<td>Lastname: </td>
						<td><input type="text" name="lastname" id="lastname" value="<?php echo $row['lastname'];?> " size="20"></td>	
					</tr>
					<tr >
						<td>Address </td>
						<td><input type="text" name="address" id="address" value="<?php echo $row['address'];?> " size="20"></td>	
					</tr>
					<tr >
						<td>Contact # </td>
						<td><input type="text" name="contact" id="contact" value="<?php echo $row['contact'];?> " size="20"></td>	
					</tr>
					<tr >
						<td align="right"><input type='submit' name='submit' value='Edit Member' ></td>
						<td><input type="button" name="cancel" value="Back"  onclick="window.location='view.php?'"> </td>
					</tr>
				</table>
		</fieldset>		
	</form>
	
</div>

</body>
</html>