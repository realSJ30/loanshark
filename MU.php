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
          <li><a href="admin.php">Loan</a></li>
          <li><a href="admin2.php">Invest</a></li>
          <li class="selected"><a href="MU.php">Messages</a></li>
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

        $sql = "select account_name,contact,username,corporate_name,g.gender_type from tbl_account join tbl_gender g using(gender_id) where username='".$username."' and password = '".$password."'";
        $result = $mysqli->query($sql);
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo 'Username:  <input type="text" placeholder="Username" value="'.$row['username'].'" readonly="true" name="username">';
            echo 'Full Name: <input type="text" placeholder="AccountName" value="'.$row['account_name'].'" readonly="true" name="'.$row['account_name'].'">';
            echo 'Contact:   <input type="text" placeholder="Contact" value="'.$row['contact'].'" readonly="true" name="'.$row['contact'].'">';
            echo 'Corporate: <input type="text" placeholder="Coopertaive" value="'.$row['corporate_name'].'" readonly="true" name="cooperative">';
            echo 'Gender:    <input type="text" placeholder="gender" value="'.$row['gender_type'].'" readonly="true" name="gender">';
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
      <div class="menucontent" style="margin-left:12px;">
        <!-- insert the page content here -->
        <h1>Welcome to the Loan Shark Cooperative</h1>
        <div class='message'>
          <div class='inside'>
            <h1>Write a Message</h1>
            <h3>Compose: </h3>
            <form method="post" action="MU.php" id="myform2">
              <textarea id='text' name="message"></textarea>
              <br><br>
              <input type='submit' value='SEND' name='send' id='send' style="width: 150px; margin-left: 50px; font-size: 18px; font-family:'Exo',sans-serif; border-radius: 8px; border: 2px solid black; background-color: white; cursor: pointer;">
            </form>
          </div>
        </div>
        <div class='inbox'>
          <h1>Inbox</h1>
          <div class='inner-inbox'>
            <table width='100%' style="background-color: blue;">
              <tr>
                <th>Messages</th>
              </tr>
          <?php
          include ('dbConnection.php');
          $user = $_SESSION['username'];
          $pass = $_SESSION['password'];
          //echo $user."   ".$pass;
          function msg($user,$pass,&$accountid){
            include('dbConnection.php');
          $sqls = "select account_id from tbl_account where username = '".$user."' and password = '".$pass."'";
          $results = $mysqli->query($sqls);
          if($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
              $accountid .= $row['account_id'];
            }
          }
          }

          $accountid = "";
          msg($user,$pass,$accountid);

          $sqlinbox = "select admin_reply from tbl_accountmessages where account_id =".$accountid;
          $resultinbox = $mysqli->query($sqlinbox);
          if($resultinbox->num_rows > 0){
            while($rowinbox = $resultinbox->fetch_assoc()){
              echo "<tr><td>".$rowinbox['admin_reply']."</td></tr>";

            }

          }else{
            echo "<tr><td>You have no message!</td></tr>";
          }


          ?>
        </table>
          </div>
          <input type='submit' name='clear' value='Delete all messages' form="myform2">
          <?php
          if(isset($_POST['clear'])){
          include ('dbConnection.php');
          $user = $_SESSION['username'];
          $pass = $_SESSION['password'];
          //echo $user."   ".$pass;

          $accountid = "";
          msg($user,$pass,$accountid);
          $sqldelete = "delete from tbl_accountmessages where account_id = ".$accountid;
          $resultdelete = $mysqli->query($sqldelete) or die ($sqldelete);
          if($resultdelete){
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=MU.php\">";
          }
          }
          ?>
        </div>
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
</body>
</html>
<?php
include ('dbConnection.php');
if(isset($_POST['send'])){
  $msg = $_POST['message'];

  $user = $_SESSION['username'];
  $pass = $_SESSION['password'];
  //echo $user."   ".$pass;
  //function msg($user,$pass,&$accountid){
    include('dbConnection.php');
  $sqls = "select account_id from tbl_account where username = '".$user."' and password = '".$pass."'";
  $results = $mysqli->query($sqls);
  if($results->num_rows > 0){
    while($row = $results->fetch_assoc()){
      $accountid .= $row['account_id'];
    }
  }
  //}
  $accountid = "";
  msg($user,$pass,$accountid);
  $sql="insert into tbl_messages (account_id,feedback_message) values (".$accountid.",'".$msg."')";
  $result = $mysqli->query($sql);
  if($result){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=MU.php\">";
  }else{
    echo "<script>alert('Error!')</script>";
  }


}


?>
