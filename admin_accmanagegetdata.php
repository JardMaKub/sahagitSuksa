<?php session_start();
//header ยกเลิกการใช้ cache ของ IE
header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//ค่ากำหนดของฐานข้อมูล
include_once("DBconnect.php");
if (isset($_GET["gededID"])) {
  $getid = $_GET["gededID"];


  $accid = "";
  $accstid = "";
  $accname = "";
  $accpass = "";
  $accstate = "";

  $sql = "SELECT * FROM tbl_account WHERE acc_id = '$getid'";
  $result = mysqli_query($conn, $sql);

  $str = "";
  if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $accid = $row["acc_id"];
    $accstid = $row["acc_stdid"];
    $accname = $row["acc_name"];
    $accpass = $row["acc_pass"];
    $accstate = $row["acc_state"];
  } else {
    $str .= "No Data";
  }
}

echo "1" . chr(5) . $accid . ",," . $accstid . ",," . $accname . ",," . $accpass . ",," . $accstate;
