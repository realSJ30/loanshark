<html>
<head>
  <title>Loan Shark Cooperative | ADMIN</title>
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
          <li><a href="messages.php">Client Feedback</a></li>
          <li><a href="superadmin.php">Accounts</a></li>
          <li class="selected"><a href="transaction.php">Transactions</a></li>
          <li><a href="login.php">Logout</a></li>
        </ul>
      </div>
    </div>
<div id="site_content">
      <div class="menucontent2" style="margin-left:12px;">
        <!-- insert the page content here -->
        <h1>Welcome to the Loan Shark Cooperative</h1>
        <div class="table">
          <form name="form" method="post" action="superadmin.php">
        		<fieldset>
        			<legend align="center" >Client Information</legend>
              <form action="superadmin.php" method="post">
              <table align="center" style="font-size: 14px;"border = "1"class="accounts">
                <tr>
                  <td>Transaction ID</td>
                  <td>Amount</td>
                  <td>Date</td>
                  <td>Status</td>
                  <td>Information</td>
                  <td>Bank Name</td>
                  <td>Account ID</td>
                  <td>Account Name</td>

                </tr>
              <?php
                include ('dbConnection.php');
                $sql = "select t.transact_id,t.amount,t.date,s.status_type,t.transact_info,b.bank_name,t.account_id,a.account_name from tbl_transaction t join tbl_status s using(status_id) join tbl_bank b using (bank_id) join tbl_account a using(account_id)";
                $result = $mysqli->query($sql);
                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td><input type='text' value='".$row['transact_id']."' name='t_id' readonly='true' style='font-size: 12px; width: 20px; outline:0; border:0;background-color: inherit; color: gray;'></td>";
                    echo "<td>".$row['amount']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['status_type']."</td>";
                    echo "<td>".$row['transact_info']."</td>";
                    echo "<td>".$row['bank_name']."</td>";
                    echo "<td>".$row['account_id']."</td>";
                    echo "<td>".$row['account_name']."</td>";
                    echo "</tr>";
                  }
                }
              ?>
        				</table>
              </form>
        		</fieldset>
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
