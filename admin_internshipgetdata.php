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


  $stdtn_id = "";
  $stdtn_year = "";
  $org_orgid = "";
  $stdtn_stdid = "";
  $stdtn_type = "";
  $stdtn_jobdesc = "";
  $stdtn_status = "";
  $stdtn_reason = "";
  $std_name = "";

  $sql = "SELECT tbl_internship.stdtn_id,tbl_internship.stdtn_year,
  tbl_internship.stdtn_stdid ,tbl_internship.org_orgid,
  tbl_internship.stdtn_type,tbl_internship.stdtn_jobdesc ,
  tbl_internship.stdtn_status,tbl_internship.stdtn_reason ,
  tbl_student.std_name FROM tbl_internship,tbl_student 
  WHERE tbl_internship.stdtn_id = '$getid' AND 
  tbl_student.std_stdid = tbl_internship.stdtn_stdid;";
  $result = mysqli_query($conn, $sql);

  $str = "";
  if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    $stdtn_id = $row["stdtn_id"];
    $stdtn_year = $row["stdtn_year"];
    $org_orgid = $row["org_orgid"];
    $stdtn_stdid = $row["stdtn_stdid"];
    $stdtn_type = $row["stdtn_type"];
    $stdtn_jobdesc = $row["stdtn_jobdesc"];
    $stdtn_status = $row["stdtn_status"];
    $stdtn_reason = $row["stdtn_reason"];
    $std_name = $row["std_name"];
  } else {
    $str .= "No Data";
  }
}

echo "1" . chr(5) . $stdtn_id . ",," . $stdtn_year . ",," . $org_orgid . ",," . $stdtn_stdid . ",," . $stdtn_type. ",," . $stdtn_jobdesc . ",," . $stdtn_status . ",," . $stdtn_reason . ",," . $std_name;
