<html>
<head>
  <title>Loan Shark Cooperative | Menu</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" href="css/menu.css">
  <script class="jsbin" src="js/jquery.min.js"></script>
  <script class="jsbin" src="js/jquery-ui.min.js"></script>
</head>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="admin.php">Loan<span class="logo_colour">Shark</span></a></h1>
          <h2>Cooperative</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- butangan og class="selected" sa each page pra mabalan kng unsa nga page ang giclick -->
          <li><a href="admin.php">Loan</a></li>
          <li><a href="admin2.php">Invest</a></li>
          <li><a href="MU.php">Message Us</a></li>
          <li><a href="aboutus.php">About us</a></li>
          <li class="selected"><a href="account.php">Account</a></li>
          <li><a href="login.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- sidebar items -->

        <h3>PROFILE</h3>
		<div class="idpicture">
        <?php
        session_start();
        include ('dbConnection.php');
        $user1 = $_SESSION['username'];
        $pass = $_SESSION['password'];
        $sql = "select image from tbl_account where username = '".$user1."' and password ='".$pass."'";
        $result = $mysqli->query($sql);
        if($result->num_rows){
          while($row = $result->fetch_assoc()){
            echo "<img id='blah' src='".$row['image']."' alt='your image' width='70' height='70'/>";
          }
        }else{
          echo '<img id="blah" src="#" alt="your image" />';
        }

        ?>
		</div>
      <input type='file' onchange="readURL(this);" form='form2' name='img' />

        <h3>Connect with: </h3>
        <ul>
          <li><a href="facebook.com">Facebook</a></li>
          <li><a href="twitter.com">Twitter</a></li>
          <li><a href="instagram.com">Instagram</a></li>
        </ul>
      </div>
      <div class="menucontent" style="margin-left:18px;">
        <!-- insert the page content here -->
        <h1>My Account</h1>
		<form id='form2' method='post' action='account.php'>
        <?php

        include ('dbConnection.php');
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        $sql = "select account_name,contact,username,password,corporate_name,pin_card from tbl_account where username='".$username."' and password = '".$password."'";
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo 'Username:          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" placeholder="Username" value="'.$row['username'].'" name="usernme" form="form2"><br>';
			      echo 'Current Password:  <input type="password" placeholder="Password" value="'.$row['password'].'" name="password" form="form2"><br>';
            echo 'Full Name:         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" placeholder="AccountName" value="'.$row['account_name'].'" name="account_name" form="form2"><br>';
            echo 'Contact:           &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" placeholder="Contact" value="'.$row['contact'].'" name="contact" form="form2"><br>';
            //echo 'Balance:   <input type="text" placeholder="Php 0.00" value="'.$row['balance'].'" readonly="true" name="balance" form="form2">';
            echo 'Corporate:         &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" placeholder="Coopertaive" value="'.$row['corporate_name'].'" name="cooperative" form="form2"><br>';
            //echo 'Gender:    <input type="text" placeholder="gender" value="'.$row['gender_type'].'" readonly="true" name="gender" form="form2">';
			      echo 'PIN:               &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" placeholder="PIN" value="'.$row['pin_card'].'" name="pin" form="form2"><br>';
          }

        }
        ?>
		<p>BankName:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		 <?php

          include ('dbConnection.php');
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$bankid = 0;
          $sql = "select bank_id, bank_name from tbl_bank";
		  $sql2 = "select bank_id from tbl_account where username='".$username."' and password ='".$password."'";
		  $result2 = $mysqli->query($sql2);
		  if($result2->num_rows > 0){
			while($row2 = $result2->fetch_assoc()){
			$bankid += $row2['bank_id'];
			}
		  }
          $result = $mysqli->query($sql);

          if($result->num_rows > 0){
            $select = "<select name='updatebank' required form='form2'>";
            while($row = $result->fetch_assoc()){
				if($bankid == $row['bank_id']){
					$select .="<option value='".$row['bank_id']."' selected='selected'>".$row['bank_name']."</option>";
				}else{
					$select .="<option value='".$row['bank_id']."'>".$row['bank_name']."</option>";
				}

            }
          }
          $select .= "</select>";
          echo $select;

        ?>
		<br><br>
		<input type='submit' id="subupdate" value='UPDATE' name='update' form='form2' ></input>
    <?php
    include ('dbConnection.php');
      if(isset($_POST['update'])){
        $username = $_POST['usernme'];
        $currentpass = $_POST['password'];
        $user = $_SESSION['username'];
        $pass = $_SESSION['password'];
        $fname = $_POST['account_name'];
        $contact = $_POST['contact'];
        $corpor = $_POST['cooperative'];
        $pin = $_POST['pin'];
        $bank = $_POST['updatebank'];
        $img = $_POST['img'];

        if($img != ""){
          $imgfinal = addslashes("profilepic\\".$img."");
          $sqlu = 'update tbl_account set username ="'.$username.'", password = "'.$currentpass.'", account_name = "'.$fname.'",contact = "'.$contact.'", corporate_name = "'.$corpor.'", pin_card = "'.$pin.'", bank_id = '.$bank.', image = "'.$imgfinal.'" where username = "'.$user.'" and password = "'.$pass.'"';
          $resultu = $mysqli->query($sqlu) or die ("Could not execute query");

          if($resultu){
            echo "<script>alert('Account Successfully Updated!Relog-in your account to secure!')</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
          }else{
            echo "ERROR: Could not able to execute $sqlu. " . mysqli_error($mysqli);
          }
        }
        else {
          $sqlu = "update tbl_account set username ='".$username."', password = '".$currentpass."', account_name = '".$fname."',contact = '".$contact."', corporate_name = '".$corpor."', pin_card = '".$pin."', bank_id = ".$bank." where username = '".$user."' and password = '".$pass."'";
          $resultu = $mysqli->query($sqlu) or die ("Could not execute query");

          if($resultu){
            echo "<script>alert('Account Successfully Updated!Relog-in your account to secure!')</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
          }else{
            echo "ERROR: Could not able to execute $sqlu. " . mysqli_error($mysqli);
          }
        }


        }

    ?>
		</form>
		</p>
        <p>Accounts that have initialize transactions to this site is safe and secured from phishinig.</p>
        <h3>Created by:</h3>
        <p><strong>Seth Joshua R. Moraga - BSIT-II</strong></p>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Loan Shark Cooperative | Developer - <strong>SJ Moraga</strong>
    </div>
  </div>

  <script>
  var modal = document.getElementById('transact-field-loan');
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }


  </script>
  <script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(70)
                .height(70);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
  </script>
</body>
</html>
