<?php
	
	include('dbcon.php');

//script for image
function findexts($f){
    $f=strtolower($f);
    $exts=split('[/\\.]', $f);
    $n=count($exts)-1;
    $exts=$exts[$n];
    return $exts;
}

	//$id = $_POST['id'];
	//$i->get_number();
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	
	/* FILE UPLOAD
						$filename = $_FILES['uploaded']['name'];
						$target="sample/images/profile/";
						//$target="C:\xampp\htdocs\sample\images\profile";
						$fexts = findexts($filename);
						$target = $target.basename($_FILES['uploaded']['name']);
						$ok=1;
						echo here."  ".$filename.$fexts;
						if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)){
						$newfileName="sample/images/profile/".$filename.".".$fexts."";
						rename("$target", "$newfileName");
					}

					//$FileExtension=$_POST['fexts'];//$fexts;
					
					$FileExtension=$fexts;
					echo $FileExtension;
	
	//Insert Image
	$tempname=$_FILES["uploaded"]["tmp_name"];
	$originalname=$_FILES["uploaded"]["name"];
	$size=($_FILES["uploaded"]["size"]/5242880)
	$type=$_FILES["uploaded"]["type"];
	$image=$_FILES["uploaded"]["name"];
	move_uploaded_file($_FILES["uploaded"]["tmp_name"],"images/".$_FILES["uploaded"]["name"])*/
	
?>
<html>
<head>
<title>Add person</title>
</head>
<script type="text/javascript">


//script for checking forms
function checkform()
{
	var numExp = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z- ]+$/;
	var alphaNumExp = /^[0-9a-zA-Z- ]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

	//FIRSTNAME  
	if (!document.form.firstname.value.match(alphaExp)){
    alert("Fill up First Name.\n\nMust consist of LETTERS only.")
      return false}
	//LASTNAME
	if (!document.form.lastname.value.match(alphaExp)){
    alert("Fill up Last Name.\n\nMust consist of LETTERS only.")
      return false}
	else
	return true;
}

</script>
<body>
	<?php
	
	//	$IdNum = strip_tags(trim($IdNum));
		$firstname = strip_tags(trim($firstname));
		$lastname = strip_tags(trim($lastname));
		$address = strip_tags(trim($address));
		$contact = strip_tags(trim($contact));

		if($_POST['lastname']  == "" || is_numeric($_POST['lastname'])){
			echo "<script type=\"text/javascript\">window.alert(\"Please provide a valid Lastname.\")</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=addPerson.php\">"; }					
		else if($_POST['firstname'] == "" || is_numeric($_POST['firstname'])){
			echo "<script type=\"text/javascript\">window.alert(\"Please provide a valid Firstname.\")</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=addPerson.php\">"; }
		else if($_POST['address'] == "" || is_numeric($_POST['address'])){
			echo "<script type=\"text/javascript\">window.alert(\"Please provide a valid Middle Name.\")</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=addPerson.php\">"; }
	
		else{			
					$query1 = "INSERT INTO person(firstname,lastname,address,contact) VALUES ('$firstname','$lastname','$address','$contact')";
					$result = $dbconn->query($query1) or die ("Couldn't execute query.");


					//echo "Hurray!";
				
		}
		if($result){
			//echo "1 file added.";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=view.php\">";
		}

	?>
</body>
</html>