<!DOCTYPE html>
<?php  
error_reporting(0);
//require_once("addPerson.php");
include('dbcon.php'); 

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}  

 ?>  

<html>
	<script runat="server"></script> 
<head>
	<title>View Person</title>
	<style>
		body{
			margin: 50px 300px 20px 200px;
			align:left;
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
		<fieldset style="border: 1px purple solid;" >
			<legend style="color:purple; font-size: 20px;" align="center" > Viewing</legend>
			
				<h2 align="center"><font color="red">WELCOME! </font></h2><hr>
				<div>	
					<div >	
						<div >

						<form method="post" action="editPerson.php" >
							<table style="width: center;">
								<table id="tableOne" class="yui" style="position:relative;  width: 905px;">    
									<thead>
										<tr><td colspan="4"><td>
											<td align="left">
											<a href="addPerson.php" ><img src="images/person.png" width="24px" title="Add Person"></a></td></tr>
										<tr>							
											<!--<th style="text-align:left">#</th>	-->
											<th style="text-align:left">ID </th>
											<th style="text-align:left">Firstname</th>
											<th style="text-align:left">Lastname</th>
											<th style="text-align:left">Address</th>
											<th style="text-align:left">Contact</th>			
											<th style="text-align:left">Action</th>											
										</tr>
									</thead>
									<?php 		
										$sql = "SELECT * FROM person";
										$result = $dbconn->query($sql);//database created - SELECT, SHOW, DESCRIBE, EXPLAIN and other statements returning resultset,
										
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {//fetch and output data of each row
									?>
									<tbody>
				
									<tr>
										<?php //echo here; ?>
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['firstname']; ?></td>
										<td><?php echo $row['lastname']; ?></td>
										<td><?php echo $row['address']; ?></td>
										<td><?php echo $row['contact']; ?></td>
										<td>
										<a href="editPerson.php?id=<?php echo $row['id'];?> "> <img src="images/edit.png" width="24px" title="Edit Information"></a>
										<a  href="deletePerson.php?id=<?php echo $row['id'];?>" > <img id="filterClearOne" src="images/del.png" title="Delete" alt="Delete" />  </a>
										</td>										
									</tr>
										
									<?php 
										}
									}else {
											echo "0 results";
									}?>
									
									</tbody>
								</table>
							</table>
						</form>
						</div>	
					</div>
				</div>
		</fieldset>	
	</form>
</div>
			
</body>
</html>		
			