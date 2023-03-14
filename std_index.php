<?php session_start();
if (($_SESSION['logon'] != true) || ($_SESSION['state'] != "2")) {
    header("Location: indexx.php");
}
include_once("DBconnect.php");

$userid = $_SESSION['userid'];
$sqlcheckisidcreated = "SELECT * FROM tbl_student WHERE std_stdid = '$userid'";
$resultstd = mysqli_query($conn, $sqlcheckisidcreated);
$statusidcheck = "false";

if (mysqli_num_rows($resultstd) != 0) {
    $row = mysqli_fetch_assoc($resultstd);
    $statusidcheck = "true";
    $std_id = $row["std_id"];
    $std_stdid = $row["std_stdid"];
    $std_name = $row["std_name"];
    $std_year = $row["std_year"];
    $std_type = $row["std_type"];
    $std_tel = $row["std_tel"];
    if ($std_type == "2") {
        $std_type = "4 ปีปกติ";
    } else {
        $std_type = "2 ปีต่อเนื่อง";
    }
    $statuinrturncheck = "false";
    $sqlcheckinturn = "SELECT tbl_internship.stdtn_id,tbl_internship.stdtn_year, 
            tbl_internship.stdtn_stdid ,tbl_internship.org_orgid, 
            tbl_internship.stdtn_type,tbl_internship.stdtn_jobdesc , 
            tbl_internship.stdtn_status,tbl_internship.stdtn_reason , 
            tbl_student.std_name,tbl_organization.org_name 
            FROM tbl_internship, tbl_student ,tbl_organization 
            WHERE tbl_internship.stdtn_stdid = '$std_stdid' 
            AND tbl_student.std_stdid = tbl_internship.stdtn_stdid 
            AND tbl_organization.org_orgid = tbl_internship.org_orgid;";
    $resultinturn = mysqli_query($conn, $sqlcheckinturn);
    if (mysqli_num_rows($resultinturn) != 0) {
        $statuinrturncheck = "true";
    }
} else {
    $nothingsshow = "No Data";
    $statusidcheck = "false";
}


?>
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
    <script src="script.js" type="text/javascript"></script>
    <title>: ระบบจัดการนักศึกษาสหกิจ :</title>
</head>

<body>
    <div class="headerr">
        <div class="container headerText">
            <h3 class="main">ระบบจัดการนักศึกษาสหกิจ</h3>
            <div>
                <label class="sec">สวัสดี : <?php echo $_SESSION['uname']; ?></label>
                <form action="std_cont.php" method="get">
                    <button name="logout" type="submit" class="btn-danger btn-sm">ออกจากระบบ</button>
                </form>
            </div>
        </div>
    </div>
    <div class="contentt">
        <div class="container d-flex justify-content-center p-4">
            <!-- not yet create student info -->
            <?php if ($statusidcheck == "false") { ?>
                <div class="">
                    <div class="">
                        <form action="std_cont.php" method="post">
                            <div class="row">
                                <div class="row p-3">
                                    <h2>Please complete form</h2>
                                </div>
                                <label for="std_type" class="col-3">Student type : </label><br>
                                <div class="col-2 form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="std_type" id="std_type_1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">2 ปีต่อเนื่อง</label>
                                </div>
                                <div class="col-2 form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="std_type" id="std_type_2" value="2" checked>
                                    <label class="form-check-label" for="inlineRadio2">4 ปีปกติ</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <label for="std_stdid">Studen ID : </label>
                                    <input value="<?php echo $userid; ?>" id="std_stdid" name="std_stdid" class="form-control" type="text" placeholder="Enter ID Student" readonly>
                                </div>
                                <div class="std_id col-4">
                                    <label class="col-10" for="std_year">Year : </label>
                                    <select class="form-control" name="std_year" id="std_year">
                                        <option value="none">-- Select --</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="std_name">Student Name : </label>
                                    <input value="" id="std_name" name="std_name" class="form-control" type="text" placeholder="Enter name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="std_tel">Studen Telephone : </label>
                                    <input value="" id="std_tel" name="std_tel" class="form-control" type="number" placeholder="Enter phone number" required><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 addbtn">
                                    <button name="savenow" onclick="return checksavestd()" type="submit" class="btn">เพิ่มข้อมูล</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- creadted student info -->
        <?php if ($statusidcheck == "true") { ?>
            <div class="container d-flex">
                <div class="col-6">
                    <h2>Your personale infomation</h2><br>
                    <label for="stdid">รหัสนักศึกษา : </label>
                    <h3><?= $std_stdid ?></h3>
                    <label for="stdname">ชื่อ : </label>
                    <h3><?= $std_name ?></h3>
                    <label for="stdtype">ประเภท : </label>
                    <h3><?= $std_type ?></h3>
                    <label for="stdyear">ปีที่ : </label>
                    <h3><?= $std_year ?></h3>
                    <label for="stdtel">เบอร์ติดต่อ : </label>
                    <h3><?= $std_tel ?></h3>
                    <label for="hint">* หากอยากเปลี่ยนข้อมูลส่วนตัว กรุณาติดต่อผู้ดูแล *</label>
                </div>
                <div class="col-6">
                    <h2>Your training infomation</h2><br>
                    <div class="eachinfo">
                        <?php if ($statuinrturncheck == "true") {
                            foreach ($resultinturn as $row) {
                                if ($row["stdtn_type"] == "1") {
                                    $row["stdtn_type"] = "ฝึกงาน 2 เดือน";
                                } else {
                                    $row["stdtn_type"] = "สหกิจ 4 เดือน";
                                }
                                if ($row["stdtn_status"] == "1") {
                                    $row["stdtn_status"] = "ผ่าน";
                                } elseif ($row["stdtn_status"] == "2") {
                                    $row["stdtn_status"] = "ระหว่างการฝึก";
                                } elseif ($row["stdtn_status"] == "3") {
                                    $row["stdtn_status"] = "ไม่ผ่าน";
                                }
                        ?>

                                <label for="stdid">ปีที่ไปฝึก : </label>
                                <h3><?= $row["stdtn_year"] ?></h3>
                                <label for="stdname">บริษัท : </label>
                                <h3><?= $row["org_name"] ?></h3>
                                <label for="stdtype">ประเภทการไป : </label>
                                <h3><?= $row["stdtn_type"] ?></h3>
                                <label for="stdyear">รายระเอียดการฝึก : </label>
                                <h3><?= $row["stdtn_jobdesc"] ?></h3>
                                <label for="stdtel">หมายเหตุ : </label>
                                <h3>* <?= $row["stdtn_reason"] ?></h3>
                                <label for="stdtel">สถานะการฝึก : </label>
                                <h3><?= $row["stdtn_status"] ?></h3>
                                <h3>-- End --</h3>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
<?php

?>

</html>