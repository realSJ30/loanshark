<html>
<head>
  <meta charset="utf-8">
<title>LoanShark Cooperative</title>
<link rel="stylesheet" href="css\mainstyle.css"></link>
<?php
session_start();  //starts session
include ('dbConnection.php');

if(isset($_POST['login'])){
  if($_POST['user'] == "adminadmin" && $_POST['password'] == "password"){
      header('Location: superadmin.php');
  }else{


  $sql = "select *from tbl_account where username='".$_POST['user']."' and password = '".$_POST['password']."'";
  $result = $mysqli->query($sql);
  if($result->num_rows > 0){
    //$usernme = $_POST['user'];
    //$passwrd = $_POST['password'];
    $_SESSION['username'] = $_POST['user'];    //stores the data
    $_SESSION['password'] = $_POST['password'];  //stores the data
    //echo $_SESSION['usernme'];
  header('Location: admin.php');

}else{
  echo "<script>alert('Incorrect Username or password!!!')</script>";
}
}
}
?>
</head>
<body>
  <div class="body"></div>
  <div class="header">
    <div>Loan<span>Shark</span></div><br>
    <div class="coop">&nbsp&nbspCooperative</div>
  </div>
  <br>
  <div class="login">
    <form action="login.php" method="post">
      <input type="text" placeholder="username" name="user"><br>
      <input type="password" placeholder="password" name="password"><br>
      <input class="log" type="submit" value="Login" name="login" id="login">
      <button class="reg" type="button" value="Register" onclick="document.getElementById('modal-wrapper').style.display='block'">Register</button>
    </form>
  </div>


  <div id="modal-wrapper" class="modal">
    <form class="modal-content animate" action="login.php" method="post" id="regform">
      <div class="modal-header">
        <h1 style="text-align:center">Register Form</h1>
      </div>
      <div class="container">
      <table>
      <tr>
        <td rowspan="5">
          <br><br>
        Full Name: <br>
          <input type="text" placeholder="First Name, Middle, Family Name" name="name" form="regform" required><br><br>
        Contact: <br>
          <input type="text" placeholder="Cell No./ Tel No." name="contact"form="regform" required><br><br>
        Address: <br>
          <input type="text" placeholder="Street/Hometown/City" name="address"form="regform" required><br><br>
        Gender: <br>
        <input type="radio" value="1" name="gender"form="regform"> Male &nbsp&nbsp <input type="radio" value="2" name="gender"form="regform"> Female <br><br>
        CivilStatus: <br>
        <select name="civil"form="regform" required>
          <option value = "1">Single</option>
          <option value = "2">Married</option>
          <option value = "3">Widowed</option>

        </select>
        <br><br>
        <input type="checkbox" name="termsandcon" required> I Agree to Terms and Conditions...<br><br>
        <?php
          include ('dbConnection.php');
          $sql = "select bank_id, bank_name from tbl_bank";
          $result = $mysqli->query($sql);
          if($result->num_rows > 0){
            $select = "<select name='bank' required>";
            while($row = $result->fetch_assoc()){
              $select .="<option value='".$row['bank_id']."'>".$row['bank_name']."</option>";
            }
          }
          $select .= "</select>";
          echo $select;
        ?>
        <br><br>

        </td>
                            <td rowspan="5"></td>
                            <td rowspan="5"></td>
                            <td rowspan="5"></td>
                            <td rowspan="5"></td>
                            <td rowspan="5"></td>
                            <td rowspan="5"></td>
                            <td rowspan="5"></td>

        <td rowspan="5">
          <br><br>
        Corporate Name: <br>
          <input type="text" placeholder="e.g Abbreviations, Company Initials" name="corporate"form="regform"><br><br>
        Choose Transaction: <span class="question" title="Note: You can change this later!">&#63;</span><br>
          <input type="radio" value="Borrower" name="transact"> Borrower &nbsp&nbsp <input type="radio" value="Lender" name="transact"> Lender <input type="radio" value="Both" name="transact"> Both<br><br>
        Nationality: <br>
          <input type="text" placeholder="e.g (Filipino, American, Chinese, ..)" name="nationality"form="regform"><br><br>
        Username: <br>
          <input type="text" placeholder="Username" name="username"form="regform" required><br><br>
        Password: <input type="checkbox" onclick="showPass()">Show Password<br>
          <input type="password" placeholder="password" name="regpassword" id="pass"form="regform" required><br><br>
        PIN:
          <input type="password" placeholder="*****" name="pin-number" id="pass"form="regform" required><br><br>
          <input type="submit" value="R E G I S T E R" name="submit" form="regform" id="submit">
        </td>


      </tr>
      </table>


      </div>


    </form>

  </div>

  <script>
  // If user clicks anywhere outside of the modal, Modal will close
  var modal = document.getElementById('modal-wrapper');
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  function showPass(){
  var x = document.getElementById('pass');

      if (x.type == "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
      }
  </script>




  <div class="foot">
    <p class="quote">Work directly with you, Safe, Can shop your rate with multiple lenders.</p>
    <p class="contact">Contact me: 999-882-1233 -- <span> Developer: SJ Moraga</span></p>
  </div>




</body>
</html>
<html>
<?php
include ('dbConnection.php');
if(isset($_POST['submit'])){
  $fullname = $_POST['name'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $civilstat = $_POST['civil'];
  $corpo = $_POST['corporate'];
  $national = $_POST['nationality'];
  $username = $_POST['username'];
  $password = $_POST['regpassword'];
  $bank_name = $_POST['bank'];
  $pincode = $_POST['pin-number'];

    $query1 = "insert into tbl_account (account_name,gender_id,cs_id,nationality,address,corporate_name,contact,username,password,bank_id,pin_card) values ('".$fullname."',".$gender.",".$civilstat.",'".$national."','".$address."','".$corpo."','".$contact."','".$username."','".$password."','".$bank_name."','".$pincode."')";
    //$result = $mysqli->query($query1);

    if(mysqli_query($mysqli,$query1)){
          echo "1 file added.";

        }else{
          echo "ERROR: Could not able to execute $query1. " . mysqli_error($mysqli);

        }

}
?>

</html>
