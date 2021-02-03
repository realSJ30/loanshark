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
          <li class="selected"><a href="superadmin.php">Accounts</a></li>
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
          <form name="form" method="post" action="superadmin.php">
        		<fieldset>
        			<legend align="center" >Client Information</legend>
              <form method="post" action="superadmin.php" >
							<table style="margin-top: 0;">
								<table id="tableOne" class="yui" style="width: 860px;">
									<thead>
										<tr><td colspan="4"><td>
											<td align="left">
										<tr>
											<!--<th style="text-align:left">#</th>	-->
											<th style="text-align:left">ID </th>
											<th style="text-align:left">Account Name</th>
											<th style="text-align:left">Username</th>
											<th style="text-align:left">Gender</th>
											<th style="text-align:left">Loaned Money</th>
											<th style="text-align:left">Investment</th>
                      <th style="text-align:left">Bank</th>
                      <th style="text-align:left">Action</th>

										</tr>
									</thead>
									<?php
                  include ('dbConnection.php');
										$sql = "SELECT a.account_id, a.account_name, a.username,g.gender_type,a.loaned_money,a.investment,b.bank_name FROM tbl_account a join tbl_gender g using(gender_id) join tbl_bank b using(bank_id)";
										$result = $mysqli->query($sql);

										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {//fetch and output data of each row
									?>
									<tbody>

									<tr>
										<?php //echo here; ?>
										<td><?php echo $row['account_id']; ?></td>
										<td><?php echo $row['account_name']; ?></td>
										<td><?php echo $row['username']; ?></td>
										<td><?php echo $row['gender_type']; ?></td>
										<td><?php echo $row['loaned_money']; ?></td>
                    <td><?php echo $row['investment']; ?></td>
                    <td><?php echo $row['bank_name']; ?></td>
										<td>
										<a href="update.php?id=<?php echo $row['account_id'];?>&loaned=<?php echo $row['loaned_money'];?>&investment=<?php echo $row['investment'];?>">Update</a>
										<a  href="delete.php?id=<?php echo $row['account_id'];?>" >Remove</a>
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
