<?php
if(isset($_GET["info"]) && ($_GET["info"] == "del1") ){
    echo "<script>showaleart(\"Delete Successful.\")</script>";
}
if(isset($_GET["info"]) && ($_GET["info"] == "del0")){
    echo "<script>showaleart(\"Cannot Delete !!!\")</script>";
}
if(isset($_GET["info"]) && ($_GET["info"] == "add1")){
    echo "<script>showaleart(\"Create Successfull.\")</script>";
}
if(isset($_GET["info"]) && ($_GET["info"] == "add0")){
    echo "<script>showaleart(\"Create Faile . Duplicate ID !!!\")</script>";
}
if(isset($_GET["info"]) && ($_GET["info"] == "up1")){
    echo "<script>showaleart(\"Update complete.\")</script>";
}
if(isset($_GET["info"]) && ($_GET["info"] == "up0")){
    echo "<script>showaleart(\"Update Fail !!!\")</script>";
}

if(isset($_GET["info"]) && ($_GET["info"] == "nostdororg")){
    echo "<script>showaleart(\"Plese check your OrganizationID and StudentID !!! ( operation fail )\")</script>";
}
?>