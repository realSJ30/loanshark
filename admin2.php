<html>
<head>
  <title>Loan Shark Cooperative | Menu</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" href="css/menu.css">
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
          <li><a href="admin.php">Loan</a></li >
          <li class="selected"><a href="admin2.php">Invest</a></li>
          <li><a href="MU.php">Message Us</a></li>
          <li><a href="aboutus.php">About us</a></li>
          <li><a href="account.php">Account</a></li>
          <li><a href="login.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- sidebar items -->
        <h3>PROFILE</h3>
        <div class="profile-image">
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
          }

          ?>
        </div>
        <br>
        <?php
        //session_start();
        include ('dbConnection.php');
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        $sql = "select account_name,contact,username,corporate_name,investment,g.gender_type from tbl_account join tbl_gender g using(gender_id) where username='".$username."' and password = '".$password."'";
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo 'Username:  <input type="text" placeholder="Username" value="'.$row['username'].'" readonly="true" name="username" form="form2">';
            echo 'Full Name: <input type="text" placeholder="AccountName" value="'.$row['account_name'].'" readonly="true" name="account_name" form="form2">';
            echo 'Contact:   <input type="text" placeholder="Contact" value="'.$row['contact'].'" readonly="true" name="'.$row['contact'].'" form="form2">';
            echo 'Investment Balance:   <input type="text" placeholder="Php 0.00" value="'.$row['investment'].'" readonly="true" name="balance" form="form2">';
            echo 'Corporate: <input type="text" placeholder="Coopertaive" value="'.$row['corporate_name'].'" readonly="true" name="cooperative" form="form2">';
            echo 'Gender:    <input type="text" placeholder="gender" value="'.$row['gender_type'].'" readonly="true" name="gender" form="form2">';
          }

        }


        ?>
        <h3>Connect with: </h3>
        <ul>
          <li><a href="facebook.com">Facebook</a></li>
          <li><a href="twitter.com">Twitter</a></li>
          <li><a href="instagram.com">Instagram</a></li>
        </ul>
      </div>
      <div class="menucontent">
        <!-- insert the page content here -->
        <h1>Welcome to the Loan Shark Cooperative</h1>
        <div class="transact-field" id="transact-field-loan">
          <form action="admin2.php" method="post" id="form2">
            <h3>Invest</h3>
            <p>Amount to Invest: <input type='text' name='investamount' required></p>
            <p>Comment:<br>
              <textarea name="comment"></textarea>
            </p>
            <p>Date to be issued: <input type="date" name="dateissue"></p>
            <input type="submit" name="invest" value="INVEST">
          </form>
          <?php
          //include ('dbConnection.php');
          //if loan is clicked!!!
          if(isset($_POST['invest'])){
            $name = $_POST['account_name'];
            $usernme = $_POST['username'];
            $amount = $_POST['investamount'];
            $comment = $_POST['comment'];
            $date = $_POST['dateissue'];
            function know($usernme, $name,$amount,$comment,$date,&$accountID,&$bankID,&$investment){
              include ('dbConnection.php');
              //$accountID = "";
              //$bankID = "";
              $sql = "select account_id,bank_id,investment from tbl_account where username='".$usernme."' and account_name = '".$name."'";
              //pra sa account id //
              $result = $mysqli -> query($sql);
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  $bankID = $row['bank_id'];
                  $accountID = $row['account_id'];
                  $investment = $row['investment'];

                }
              }else{
                echo "Error: ".mysqli_error($mysqli)."<br>";
              }

            }
            $bankID = "";
            $accountID = "";
            $investment = 0;
            know($usernme, $name,$amount,$comment,$date,$accountID,$bankID,$investment);
            //insert to table transaction//
            $sql2 = "insert into tbl_transaction (account_id,amount,date,status_id,transact_info,bank_id) values (".$accountID.",".$amount.",'".$date."',1,'".$comment."',".$bankID.")";
            $result2 = $mysqli -> query($sql2);
            if($result2){
              echo "transact created!";
            }else{
              echo "ERROR: Could not able to execute $sql2. " . mysqli_error($mysqli);
            }
            $total = $investment + $amount ;
            $sql3 = "update tbl_account set investment = ".$total." where account_id = ".$accountID."";
            $result3 = $mysqli -> query($sql3);
            if($result3){
              echo "balance updated!";
          	echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin2.php\">";
            }else{
              echo "ERROR: Could not able to execute $sql3. " . mysqli_error($mysqli);
            }


          }
          ?>
        </div>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; Loan Shark Cooperative | Developer - <strong>SJ Moraga</strong>
    </div>
  </div>
</body>
</html>
