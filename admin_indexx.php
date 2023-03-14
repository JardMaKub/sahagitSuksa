<?php session_start();
if (($_SESSION['logon'] != true) || ($_SESSION['state'] != "1")) {
    header("Location: indexx.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font style :: font-family: 'Athiti', sans-serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@300;400&display=swap" rel="stylesheet">

    <!-- style -->
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>: ระบบจัดการนักศึกษาสหกิจ :</title>
</head>

<body>
    <div class="headerr">
        <div class="container headerText">
            <h3 class="main">ระบบจัดการนักศึกษาสหกิจ</h3>
            <div>
                <label class="sec">สวัสดี : <?php echo $_SESSION['uname']; ?></label>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                    <button name="logout" type="submit" class="btn-danger btn-sm">ออกจากระบบ</button>
                </form>
            </div>
        </div>
    </div>
    <div class="contentt">
        <div class="container">
            <div class="left">
                <button type="button" class="btn btn-primary btn-lg buttt" onclick="javascript:location.href='admin_student.php'">จัดการข้อมูล นักศึกษา</button>
                <button type="button" class="btn btn-primary btn-lg buttt" onclick="javascript:location.href='admin_internship.php'">จัดการข้อมูล ฝึกงาน</button>
                <button type="button" class="btn btn-primary btn-lg buttt" onclick="javascript:location.href='admin_orgmanage.php'">จัดการข้อมูล บริษัท</button>
                <button type="button" class="btn btn-primary btn-lg buttt" onclick="javascript:location.href='admin_accmanage.php'">จัดการข้อมูล ผู้ใช้งาน</button>
                <button type="button" class="btn btn-primary btn-lg buttt" onclick="javascript:location.href='admin_search.php'">ค้นหาข้อมูลการฝึกงาน</button>
            </div>
            <div class="right">
                <div class="logo">
                    <img src="img/Logoubu.png" alt="LOGO.png" width="300vw" height="300vh">
                </div>
                <button type="button" class="btn btn-primary btn-lg buttt" onclick="javascript:location.href='admin_ratio.php'">สรุปอัตราส่วน</button>
            </div>
        </div>
    </div>
</body>
<?php
if (isset($_GET["logout"])) {
    $_SESSION['logon'] = false;
    header("Location: indexx.php");
} ?>

</html>