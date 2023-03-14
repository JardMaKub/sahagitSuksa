<?php session_start();
//header ยกเลิกการใช้ cache ของ IE
header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//ค่ากำหนดของฐานข้อมูล
include_once("DBconnect.php");
$sql = "SELECT * FROM tbl_account ORDER BY acc_id DESC";
$result = mysqli_query($conn, $sql);

$str = "";
$str .= "<table><thead><tr>
            <td>AccountID</td>
            <td>ID</td>
            <td>Name</td>
            <td>State</td>
            <td>tools</td></tr>
            </thead><tbody>";

if (mysqli_num_rows($result) == 0) {
        $str .= "<tr><h2>No Data</h2></tr>";
} else {
        while ($row = mysqli_fetch_assoc($result)) {
                //echo $row["NO"] . $row["Username"] . $row["TEL"] . "<br>";
                if ($row["acc_state"] == "1"){
                        $row["acc_state"] = "Admin";
                }else{
                        $row["acc_state"] = "Student";
                }
                $str .= "<tr>";
                $str .= "<td>" . $row["acc_id"] . "</td>";
                $str .= "<td>" . $row["acc_stdid"] . "</td>";
                $str .= "<td>" . $row["acc_name"] . "</td>";
                // $str .= "<td>" . $row["acc_pass"] . "</td>";
                $str .= "<td>" . $row["acc_state"] . "</td>";
                $str .= "<td class=\"options\">
                <a onclick=\"return confirm('\ Delete =". $row["acc_name"] ."= ?')\" 
                href=\"admin_accmanagecont.php?delid=".$row["acc_id"]."\" >Del</a>

                <a onclick=\"dogetdataaccmanage('" . $row["acc_id"] . "');\" href=\"#\">Get</a></td>";
                $str .= "</tr>";
        }
}

$str .= "</tbody></table>\n";


echo "1" . chr(5) . $str;
