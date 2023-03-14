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


  $std_id = "";
  $std_stdid = "";
  $std_name = "";
  $std_year = "";
  $std_type = "";
  $std_tel = "";

  $sql = "SELECT * FROM tbl_student WHERE std_id = '$getid'";
  $result = mysqli_query($conn, $sql);

  $str = "";
  if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $std_id = $row["std_id"];
    $std_stdid = $row["std_stdid"];
    $std_name = $row["std_name"];
    $std_year = $row["std_year"];
    $std_type = $row["std_type"];
    $std_tel = $row["std_tel"];
  } else {
    $str .= "No Data";
  }
}

echo "1" . chr(5) . $std_id . ",," . $std_stdid . ",," . $std_name . ",," . $std_year . ",," . $std_type . ",," . $std_tel;
