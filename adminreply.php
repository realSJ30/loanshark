<html>
<head>
  <title>Loan Shark Cooperative | Messages</title>
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
          <li class="selected"><a href="messages.php">Client Feedback</a></li>
          <li><a href="superadmin.php">Accounts</a></li>
          <li><a href="transaction.php">Transactions</a></li>
          <li><a href="login.php">Logout</a></li>
        </ul>
      </div>
    </div>
<div id="site_content">
      <div class="menucontent2" style="margin-left:12px;">
        <!-- insert the page content here -->
        <h1>Welcome to the Loan Shark Cooperative</h1>
        <div class="table">
          <form name="form" method="post" action="adminreply.php">
        		<div class="reply_form">

              <h4>To: </h4>
              <?php
              include ('dbConnection.php');
              $id = $_GET['id'];
              $name = $_GET['account_name'];
              $msg = $_GET['msg'];
                echo "<input type='text' name='to' value='".$name."' readonly='readonly'><br>";
                echo "<input type='text' name='id_to' value='".$id."' readonly='readonly' hidden><br>";
                echo "<textarea name ='fdreply' hidden>".$msg."</textarea>";
                echo "<textarea name ='adminreply'></textarea>";
                echo "<input type='submit' name='send' value='Send'>";

                //code here//
                if(isset($_POST['send'])){
                  $sql = "update tbl_messages set admin_reply = '".$_POST['adminreply']."' where account_id = ".$_POST['id_to']." and feedback_message ='".$_POST['fdreply']."'";
                  $sql2 = "insert into tbl_accountmessages values (".$_POST['id_to'].",'".$_POST['adminreply']."')";
                  $resul2 = $mysqli->query($sql2) or die ($sql2);
                  $result = $mysqli->query($sql) or die($sql);
                  if($result){
                    echo "<script>alert('Message successfully send!')</script>";
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=messages.php\">";

                  }

                }

              ?>



            </div>
        	</form>
        </div>
        <h3>Created by:</h3>
        <p><strong>Seth Joshua R. Moraga - BSIT-II</strong></p>
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
