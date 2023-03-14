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


  $orgid = "";
  $orgorgid = "";
  $orgname = "";
  $orgadd = "";
  $orgcont = "";
  $orgtel = "";
  $orgprov = "";

  $sql = "SELECT * FROM tbl_organization WHERE org_id = '$getid'";
  $result = mysqli_query($conn, $sql);

  $str = "";
  if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);

    $orgid = $row["org_id"];
    $orgorgid = $row["org_orgid"];
    $orgname = $row["org_name"];
    $orgadd = $row["org_address"];
    $orgcont = $row["org_contectname"];
    $orgtel = $row["org_tel"];
    $orgprov = $row["org_prov"];
  } else {
    $str .= "No Data";
  }
}

echo "1" . chr(5) . $orgid . ",," . $orgorgid . ",," .
                   $orgname . ",," . $orgadd . ",," .
                   $orgcont. ",," . $orgtel. ",," . $orgprov;
