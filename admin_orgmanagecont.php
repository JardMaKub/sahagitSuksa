<?php
include_once("DBconnect.php");
session_start();

if (isset($_GET["logout"])) {
    $_SESSION['logon'] = false;
    header("Location: indexx.php");
}

if (isset($_POST["updatenow"])) {
    $orgid = $_POST["orgid"];
    $orgorgid  = $_POST["orgorgid"];
    $orgname  = $_POST["orgname"];
    $orgadd  = $_POST["orgadd"];
    $orgprov  = $_POST["orgprov"];
    $orgcont  = $_POST["orgcont"];
    $orgtel  = $_POST["orgtel"];

    $sql = "UPDATE tbl_organization SET org_orgid = '$orgorgid', org_name = '$orgname',
     org_address = '$orgadd',
     org_prov = '$orgprov', org_contectname = '$orgcont', org_tel = '$orgtel' 
     WHERE tbl_organization.org_id = $orgid;";

    $updatestatus = "";
    if (mysqli_query($conn, $sql)) {
        // header("Location: DB-HomeTel.php");
        // echo "<script>showaleart(\"Update Successful\")</script>";
        $updatestatus = "up1";
    } else {
        // echo "<script>showaleart(\"" . mysqli_error($conn) . "\")</script>";
        $updatestatus = "up0";
    }
    mysqli_close($conn);
    header("Location: admin_orgmanage.php?info=" . $updatestatus);
}

if (isset($_POST["savenow"])) {
    $orgorgid  = $_POST["orgorgid"];
    $orgname  = $_POST["orgname"];
    $orgadd  = $_POST["orgadd"];
    $orgprov  = $_POST["orgprov"];
    $orgcont  = $_POST["orgcont"];
    $orgtel  = $_POST["orgtel"];

    $sql = "INSERT INTO tbl_organization (org_id, org_orgid, org_name, org_address,
             org_prov , org_contectname, org_tel) 
    VALUES (NULL, '$orgorgid', '$orgname', '$orgadd', '$orgprov', '$orgcont', '$orgtel');";

    $updatestatus = "";
    if (mysqli_query($conn, $sql)) {
        // header("Location: DB-HomeTel.php");
        // echo "<script>showaleart(\"Create Successful\")</script>";
        $updatestatus = "add1";
    } else {
        // echo "<script>showaleart(\"" . mysqli_error($conn) . "\")</script>";
        $updatestatus = "add0";
    }
    mysqli_close($conn);
    header("Location: admin_orgmanage.php?info=" . $updatestatus);
}

if (isset($_GET["delid"])) {
    $orgidid  = $_GET["delid"];

    $sql = "DELETE FROM tbl_organization WHERE org_id = $orgidid";

    $updatestatus = "";
    if (mysqli_query($conn, $sql)) {
        // header("Location: DB-HomeTel.php");
        // echo "<script>showaleart(\"Delete Successful\")</script>";
        $updatestatus = "del1";
    } else {
        // echo "<script>showaleart(\"" . mysqli_error($conn) . "\")</script>";
        $updatestatus = "del0";
    }
    mysqli_close($conn);
    header("Location: admin_orgmanage.php?info=" . $updatestatus);
}
