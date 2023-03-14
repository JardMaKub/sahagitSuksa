<?php session_start();
//header ยกเลิกการใช้ cache ของ IE
header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//ค่ากำหนดของฐานข้อมูล
include_once("DBconnect.php");
$sql = "SELECT * FROM tbl_student ORDER BY std_id DESC";
$result = mysqli_query($conn, $sql);

$str = "";
$str .= "<table><thead><tr>
            <td>AccountID</td>
            <td>Student ID</td>
            <td>Name</td>
            <td>Type</td>
            <td>tools</td></tr>
            </thead><tbody>";

if (mysqli_num_rows($result) == 0) {
        $str .= "<tr><h2>No Data</h2></tr>";
} else {
        while ($row = mysqli_fetch_assoc($result)) {
                //echo $row["NO"] . $row["Username"] . $row["TEL"] . "<br>";
                if ($row["std_type"] == "1"){
                        $row["std_type"] = "2 ปีต่อเนื่อง";
                }else{
                        $row["std_type"] = "4 ปีปกติ";
                }
                $str .= "<tr>";
                $str .= "<td>" . $row["std_id"] . "</td>";
                $str .= "<td>" . $row["std_stdid"] . "</td>";
                $str .= "<td>" . $row["std_name"] . "</td>";
                // $str .= "<td>" . $row["acc_pass"] . "</td>";
                $str .= "<td>" . $row["std_type"] . "</td>";
                $str .= "<td class=\"options\">
                <a onclick=\"return confirm('\ Delete =". $row["std_name"] ."= ?')\" 
                href=\"admin_studentcont.php?delid=".$row["std_id"]."\" >Del</a>

                <a onclick=\"dogetdatastd('" . $row["std_id"] . "');\" href=\"#\">Get</a></td>";
                $str .= "</tr>";
        }
}


$str .= "</tbody></table>\n";


echo "1" . chr(5) . $str;
