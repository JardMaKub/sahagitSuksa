<?php
include_once("DBconnect.php");
session_start();

if (isset($_GET["logout"])) {
    $_SESSION['logon'] = false;
    header("Location: indexx.php");
}

if (isset($_POST["updatenow"])) {
    $stdtn_id = $_POST["stdtn_id"];
    $stdtn_year = $_POST["stdtn_year"];
    $org_orgid = $_POST["org_orgid"];
    $stdtn_stdid = $_POST["stdtn_stdid"];
    $stdtn_type = $_POST["stdtn_type"];
    $stdtn_jobdesc = $_POST["stdtn_jobdesc"];
    $stdtn_status = $_POST["stdtn_status"];
    $stdtn_reason = $_POST["stdtn_reason"];
    $updatestatus = "";

    $sql = "SELECT tbl_student.std_name,tbl_organization.org_name FROM tbl_student,tbl_organization 
            WHERE tbl_student.std_stdid = '$stdtn_stdid' AND tbl_organization.org_orgid = '$org_orgid';";
    $checkstdorg = mysqli_query($conn, $sql);
    $stdname = "";
    $orgname = "";
    while ($row = mysqli_fetch_assoc($checkstdorg)) {
        $stdname = $row["std_name"];
        $orgname = $row["org_name"];
    }
    if ($checkstdorg) {
        if (($stdname != "") && ($orgname != "")) {
            $sql = "UPDATE tbl_internship SET stdtn_year = '$stdtn_year',
                org_orgid = '$org_orgid', stdtn_stdid = '$stdtn_stdid' , stdtn_type = '$stdtn_type' 
                , stdtn_jobdesc = '$stdtn_jobdesc' , stdtn_status = '$stdtn_status' , stdtn_reason = '$stdtn_reason' 
                WHERE tbl_internship.stdtn_id = $stdtn_id;";
            if (mysqli_query($conn, $sql)) {
                $updatestatus = "up1";
            } else {
                $updatestatus = "up0";
            }
            mysqli_close($conn);
            header("Location: admin_internship.php?info=" . $updatestatus);
        } elseif ($stdname == "") {
            mysqli_close($conn);
            header("Location: admin_internship.php?info=" . "nostdororg");
        }
    } else {
        mysqli_close($conn);
        return "notconnect";
    }
}

if (isset($_POST["savenow"])) {
    $stdtn_year = $_POST["stdtn_year"];
    $org_orgid = $_POST["org_orgid"];
    $stdtn_stdid = $_POST["stdtn_stdid"];
    $stdtn_type = $_POST["stdtn_type"];
    $stdtn_jobdesc = $_POST["stdtn_jobdesc"];
    $stdtn_status = $_POST["stdtn_status"];
    $stdtn_reason = $_POST["stdtn_reason"];
    $updatestatus = "";

    $sql = "SELECT tbl_student.std_name,tbl_organization.org_name FROM tbl_student,tbl_organization 
            WHERE tbl_student.std_stdid = '$stdtn_stdid' AND tbl_organization.org_orgid = '$org_orgid';";
    $checkstdorg = mysqli_query($conn, $sql);
    $stdname = "";
    $orgname = "";
    while ($row = mysqli_fetch_assoc($checkstdorg)) {
        $stdname = $row["std_name"];
        $orgname = $row["org_name"];
    }
    if ($checkstdorg) {
        if (($stdname != "") && ($orgname != "")) {

            $sql = "INSERT INTO tbl_internship (stdtn_id, stdtn_year, org_orgid, stdtn_stdid, stdtn_type, stdtn_jobdesc, stdtn_status, stdtn_reason) 
            VALUES (NULL,  '$stdtn_year', '$org_orgid', '$stdtn_stdid', '$stdtn_type', '$stdtn_jobdesc', '$stdtn_status', '$stdtn_reason');";

            $updatestatus = "";
            if (mysqli_query($conn, $sql)) {
                $updatestatus = "add1";
            } else {
                $updatestatus = "add0";
            }
            mysqli_close($conn);
            header("Location: admin_internship.php?info=" . $updatestatus);
        } elseif ($stdname == "") {
            mysqli_close($conn);
            header("Location: admin_internship.php?info=" . "nostdororg");
        }
    } else {
        mysqli_close($conn);
        return "notconnect";
    }
}

if (isset($_GET["delid"])) {
    $stdtn_id  = $_GET["delid"];

    $sql = "DELETE FROM tbl_internship WHERE stdtn_id = $stdtn_id";

    $updatestatus = "";
    if (mysqli_query($conn, $sql)) {
        $updatestatus = "del1";
    } else {
        $updatestatus = "del0";
    }
    mysqli_close($conn);
    header("Location: admin_internship.php?info=" . $updatestatus);
}
