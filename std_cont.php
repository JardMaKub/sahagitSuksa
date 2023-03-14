<?php
session_start();
include_once("DBconnect.php");

if (isset($_GET["logout"])) {
    $_SESSION['logon'] = false;
    $_SESSION['state'] = "";
    header("Location: indexx.php");
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
    header("Location: std_index.php?info=" . $updatestatus);
}

?>