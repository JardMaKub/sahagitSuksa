<?php session_start();
//header ยกเลิกการใช้ cache ของ IE
header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//ค่ากำหนดของฐานข้อมูล
include_once("DBconnect.php");
$sql = "SELECT * FROM tbl_organization ORDER BY org_id DESC";
$result = mysqli_query($conn, $sql);

$str = "";
$str .= "<table><thead><tr>
            <td>No.</td>
            <td>ID</td>
            <td>Name</td>
            <td>Contactname</td>
            <td>Tel</td>
            <td>tools</td></tr>
            </thead><tbody>";

if (mysqli_num_rows($result) == 0) {
        $str .= "<tr><h2>No Data</h2></tr>";
} else {
        while ($row = mysqli_fetch_assoc($result)) {
                //echo $row["NO"] . $row["Username"] . $row["TEL"] . "<br>";
                $str .= "<tr>";
                $str .= "<td>" . $row["org_id"] . "</td>";
                $str .= "<td>" . $row["org_orgid"] . "</td>";
                $str .= "<td>" . $row["org_name"] . "</td>";
                $str .= "<td>" . $row["org_contectname"] . "</td>";
                $str .= "<td>" . $row["org_tel"] . "</td>";
                $str .= "<td class=\"options\">
                <a onclick=\"return confirm('\ Delete =" . $row["org_name"] . "= ?')\" 
                href=\"admin_orgmanagecont.php?delid=" . $row["org_id"] . "\" >Del</a>

                <a onclick=\"dogetdataorgmanage('" . $row["org_id"] . "');\" href=\"#\">Get</a></td>";
                $str .= "</tr>";
        }
}

$str .= "</tbody></table>\n";


echo "1" . chr(5) . $str;
