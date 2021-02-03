<?php
//connects to the database
include("dbcon.php"); 
?>

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

</head>
<body>

<div >
	<form name="form" method="post" action="savePerson.php">
		<?php $lastname=""; $firstname=""; $address=""; $contact=""; ?>
		<fieldset style="border: 1px purple solid">
			<legend style="color:purple; font-size: 20px;" align="center" > Add Person</legend>
			<br><h2 align="center"><font color="red">WELCOME! </font></h2><hr>
				<table align="center" cellspacing="10px">
					<tr >
						<td>Firstname: </td>
						<td><input type="text" name="firstname" ></td>
					</tr>
					<tr >
						<td>Lastname: </td>
						<td><input type="text" name="lastname" ></td>
					</tr>
					<tr >
						<td>Address </td>
						<td><input type="text" name="address" ></td>
					</tr>
					<tr >
						<td>Contact # </td>
						<td><input type="text" name="contact" ></td>
					</tr>
				<!--	<tr>
						<td>	<label for="file">Upload Profile Photo:</label>	</td>
						<td>	<input type="file" name="uploaded" id="file"/>	</td>
					</tr> -->
					<tr >
						<td align="right"><input type="submit" name="submit" value="Add"></td>
						<td ><input type="reset" name="reset" value="Reset"> &nbsp 
						<input type="button" name="cancel" value="Back"  onclick="window.location='view.php?'"> <td>
					</tr>
				</table>
		</fieldset>		
	</form>
	
</div>

</body>
</html>