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
          <li><a href="MU.php">Message Us</a></li>
          <li class="selected"><a href="aboutus.php">About us</a></li>
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
        <p>As we can observe in our generation today there are many people who tend to borrow money from cooperatives and even people who's business is to lend money to those who are in need specially when it involves small and medium scale businesses. This site is suppost to create a link between both companies that creates a proper way of conducting the treaty of both parties. It is equipped with a safe and well protected database that manages the transaction well.</p>
        <p><strong>Note: </strong>This site is only responsible for transactions and it is not reliable for personal issues that has nothing to do with this site and cooperative.</p>
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
</body>
</html>
