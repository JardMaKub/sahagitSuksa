<?php session_start();
//header ยกเลิกการใช้ cache ของ IE
header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//ค่ากำหนดของฐานข้อมูล
include_once("DBconnect.php");
$sql = "SELECT tbl_internship.stdtn_status, tbl_internship.stdtn_id , tbl_internship.stdtn_stdid , tbl_student.std_name 
FROM tbl_internship,tbl_student WHERE tbl_internship.stdtn_stdid = tbl_student.std_stdid ORDER BY tbl_internship.stdtn_id DESC";
$result = mysqli_query($conn, $sql);

$str = "";
$str .= "<table><thead><tr>
            <td>Train ID</td>
            <td>Student ID</td>
            <td>Name</td>
            <td>Status</td>
            <td>Tools</td></tr>
            </thead><tbody>";

if (mysqli_num_rows($result) == 0) {
        $str .= "<tr><h2>No Data</h2></tr>";
} else {
        while ($row = mysqli_fetch_assoc($result)) {
                //echo $row["NO"] . $row["Username"] . $row["TEL"] . "<br>";
                if ($row["stdtn_status"] == "1"){
                        $row["stdtn_status"] = "Pass";
                
                }else if($row["stdtn_status"] == "2"){
                        $row["stdtn_status"] = "Inprogress";
                }else{
                        $row["stdtn_status"] = "Fail";
                }
                        
                $str .= "<tr>";
                $str .= "<td>" . $row["stdtn_id"] . "</td>";
                $str .= "<td>" . $row["stdtn_stdid"] . "</td>";
                $str .= "<td>" . $row["std_name"] . "</td>";
                // $str .= "<td>" . $row["acc_pass"] . "</td>";
                $str .= "<td>" . $row["stdtn_status"] . "</td>";
                $str .= "<td class=\"options\">
                <a onclick=\"return confirm('\ Delete =". $row["stdtn_id"] ."= ?')\" 
                href=\"admin_internshipcont.php?delid=".$row["stdtn_id"]."\" >Del</a>

                <a onclick=\"dogetdatainternship('" . $row["stdtn_id"] . "');\" href=\"#\">Get</a></td>";
                $str .= "</tr>";
        }
}

$str .= "</tbody></table>\n";


echo "1" . chr(5) . $str;
