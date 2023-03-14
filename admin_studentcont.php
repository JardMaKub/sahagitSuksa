<?php
include_once("DBconnect.php");
session_start();

if (isset($_GET["logout"])) {
    $_SESSION['logon'] = false;
    header("Location: indexx.php");
}

if (isset($_POST["updatenow"])) {
    $std_id  = $_POST["std_id"];
    $std_stdid  = $_POST["std_stdid"];
    $std_name  = $_POST["std_name"];
    $std_year  = $_POST["std_year"];
    $std_type  = $_POST["std_type"];
    $std_tel  = $_POST["std_tel"];

    $sql = "UPDATE tbl_student SET std_stdid = '$std_stdid', std_name = '$std_name',
     std_year = '$std_year', std_type = '$std_type' , std_tel = '$std_tel'
    WHERE tbl_student.std_id = $std_id;";

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
    header("Location: admin_student.php?info=" . $updatestatus);
}

if (isset($_POST["savenow"])) {
    $std_stdid  = $_POST["std_stdid"];
    $std_name  = $_POST["std_name"];
    $std_year  = $_POST["std_year"];
    $std_type  = $_POST["std_type"];
    $std_tel  = $_POST["std_tel"];

    $sql = "INSERT INTO tbl_student (std_id, std_stdid, std_name, std_year, std_type, std_tel) 
    VALUES (NULL, '$std_stdid', '$std_name', '$std_year', '$std_type','$std_tel');";

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
    header("Location: admin_student.php?info=" . $updatestatus);
}

if (isset($_GET["delid"])) {
    $std_id  = $_GET["delid"];

    $sql = "DELETE FROM tbl_student WHERE std_id = $std_id";

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
    header("Location: admin_student.php?info=" . $updatestatus);
}
