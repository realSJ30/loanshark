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
          <form name="form" method="post" action="messages.php">
        		<fieldset >
        			<legend align="center" >Client Information</legend>
              <form method="post" action="messages.php" >
							<table style="width: center;">
								<table id="tableOne" class="yui" style="width: 860px;">
									<thead>
										<tr><td colspan="4"><td>
											<td align="left">
										<tr>
											<!--<th style="text-align:left">#</th>	-->
											<th style="text-align:left">Account ID </th>
											<th style="text-align:left">Account Name</th>
											<th style="text-align:left">Feedback Message</th>
                      <th style="text-align:left">REPLY</th>
											<th style="text-align:left">DELETE</th>


										</tr>
									</thead>
									<?php
                  include ('dbConnection.php');
										$sql = "SELECT m.account_id,a.account_name,m.feedback_message from tbl_messages m join tbl_account a using(account_id)";
										$result = $mysqli->query($sql);

										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {//fetch and output data of each row
									?>
									<tbody>

									<tr>
										<?php //echo here; ?>
										<td><?php echo $row['account_id']; ?></td>
										<td><?php echo $row['account_name']; ?></td>
                    <td><textarea style="width: 170px; height: 60px;" readonly="true"><?php echo $row['feedback_message']; ?></textarea></td>
                    <td>
                      
                      <a  href="adminreply.php?id=<?php echo $row['account_id'];?>&account_name=<?php echo $row['account_name'];?>&msg=<?php echo $row['feedback_message'];?>" >Reply</a>

                    </td>
										<td>
										<a  href="delete2.php?id=<?php echo $row['account_id'];?>&msg=<?php echo $row['feedback_message'];?>" >Remove</a>
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
