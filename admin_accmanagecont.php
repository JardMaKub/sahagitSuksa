<?php
include_once("DBconnect.php");
session_start();

if (isset($_GET["logout"])) {
    $_SESSION['logon'] = false;
    header("Location: indexx.php");
}

if (isset($_POST["updatenow"])) {
    $accid = $_POST["accid"];
    $accstate  = $_POST["accstate"];
    $accstid  = $_POST["accstid"];
    $accname  = $_POST["accname"];
    $accpass  = $_POST["accpass"];

    $sql = "UPDATE tbl_account SET acc_stdid = '$accstid', acc_name = '$accname',
     acc_pass = '$accpass', acc_state = '$accstate' 
    WHERE tbl_account.acc_id = $accid;";

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
    header("Location: admin_accmanage.php?info=" . $updatestatus);
}

if (isset($_POST["savenow"])) {
    $accstate  = $_POST["accstate"];
    $accstid  = $_POST["accstid"];
    $accname  = $_POST["accname"];
    $accpass  = $_POST["accpass"];

    $sql = "INSERT INTO tbl_account (acc_id, acc_stdid, acc_name, acc_pass, acc_state) 
    VALUES (NULL, '$accstid', '$accname', '$accpass', '$accstate');";

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
    header("Location: admin_accmanage.php?info=" . $updatestatus);
}

if (isset($_GET["delid"])) {
    $accstid  = $_GET["delid"];

    $sql = "DELETE FROM tbl_account WHERE acc_id = $accstid";

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
    header("Location: admin_accmanage.php?info=" . $updatestatus);
}
