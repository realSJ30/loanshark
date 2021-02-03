<?php
include('dbConnection.php');
$id = $_GET['id'];
$investment = $_GET['investment'];
$loanedmoney = $_GET['loaned'];
function updatebalance($investment,$loanedmoney,$id){
  include('dbConnection.php');
  if($investment >= $loanedmoney){
    $total = $investment - $loanedmoney;
    $sql = "update tbl_account set investment = ".$total.", loaned_money = 0 where account_id = ".$id."";
    $resultin = $mysqli->query($sql);
    if($resultin){
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=superadmin.php\">";
    }else{
      echo "<script>alert('Error!')</script>";
    }
  }
  else if($loanedmoney >= $investment){
    $total = $loanedmoney - $investment;
    $sql = "update tbl_account set loaned_money = ".$total.", investment = 0 where account_id = ".$id."";
    $resultlo = $mysqli->query($sql);
    if($resultlo){
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=superadmin.php\">";
    }else{
      echo "<script>alert('Error!')</script>";
    }
  }
}
updatebalance($investment,$loanedmoney,$id);
?>
