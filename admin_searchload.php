<?php session_start();
//header ยกเลิกการใช้ cache ของ IE
header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//ค่ากำหนดของฐานข้อมูล
include_once("DBconnect.php");
$searchoption = $_GET["option"];
$searchid = $_GET["sid"];

if ($searchoption == "stdname") {
        $sql = "SELECT tbl_internship.stdtn_year , tbl_student.std_name , 
                tbl_organization.org_name , tbl_internship.stdtn_type , 
                tbl_internship.stdtn_jobdesc , tbl_internship.stdtn_status , 
                tbl_internship.stdtn_reason 
                FROM tbl_student,tbl_organization,tbl_internship
                WHERE tbl_student.std_name LIKE '%$searchid%'
                AND tbl_internship.stdtn_stdid = tbl_student.std_stdid AND tbl_internship.org_orgid = tbl_organization.org_orgid;";
}
if ($searchoption == "orgname") {
        $sql = "SELECT tbl_internship.stdtn_year , tbl_student.std_name , 
                tbl_organization.org_name , tbl_internship.stdtn_type , 
                tbl_internship.stdtn_jobdesc , tbl_internship.stdtn_status , 
                tbl_internship.stdtn_reason 
                FROM tbl_student,tbl_organization,tbl_internship
                WHERE tbl_organization.org_name LIKE '%$searchid%'
                AND tbl_internship.stdtn_stdid = tbl_student.std_stdid AND tbl_internship.org_orgid = tbl_organization.org_orgid;";
}
if ($searchoption == "train_years") {
        $sql = "SELECT tbl_internship.stdtn_year , tbl_student.std_name , 
                tbl_organization.org_name , tbl_internship.stdtn_type , 
                tbl_internship.stdtn_jobdesc , tbl_internship.stdtn_status , 
                tbl_internship.stdtn_reason 
                FROM tbl_student,tbl_organization,tbl_internship
                WHERE tbl_internship.stdtn_year LIKE '%$searchid%'
                AND tbl_internship.stdtn_stdid = tbl_student.std_stdid AND tbl_internship.org_orgid = tbl_organization.org_orgid;";
}


$result = mysqli_query($conn, $sql);

$str = "";
$str .= "<table><thead><tr>
        <td>Train Years</td>
        <td>Student Name</td>
        <td>Org Name</td>
        <td>Train Type</td>
        <td>Job Description</td>
        <td>Train State</td>
        <td>Train Note</td></tr>
        </thead><tbody>";

if (mysqli_num_rows($result) == 0) {
        $str .= "<tr><h2>No Match Data</h2></tr>";
} else {
        while ($row = mysqli_fetch_assoc($result)) {
                //echo $row["NO"] . $row["Username"] . $row["TEL"] . "<br>";
                if ($row["stdtn_type"] == "1") {
                        $row["stdtn_type"] = "ฝึกงาน";
                } else {
                        $row["stdtn_type"] = "สหกิจ";
                }
                if ($row["stdtn_status"] == "1") {
                        $row["stdtn_status"] = "Pass";
                } elseif ($row["stdtn_status"] == "2") {
                        $row["stdtn_status"] = "Inprogress";
                } else {
                        $row["stdtn_status"] = "Fail";
                }

                $str .= "<tr>";

                $str .= "<td>" . $row["stdtn_year"] . "</td>";
                $str .= "<td>" . $row["std_name"] . "</td>";
                $str .= "<td>" . $row["org_name"] . "</td>";
                $str .= "<td>" . $row["stdtn_type"] . "</td>";
                $str .= "<td>" . $row["stdtn_jobdesc"] . "</td>";
                $str .= "<td>" . $row["stdtn_status"] . "</td>";
                $str .= "<td>" . $row["stdtn_reason"] . "</td>";

                $str .= "</tr>";
        }
}


$str .= "</tbody></table>\n";


echo "1" . chr(5) . $str;
