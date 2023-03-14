<?php session_start();
if (($_SESSION['logon'] != true) || ($_SESSION['state'] != "1")) {
    header("Location: indexx.php");
}
include_once("DBconnect.php");
$sql3 = "SELECT std_stdid , std_name FROM tbl_student";
$sel_result3 = mysqli_query($conn, $sql3);

$sqlorg = "SELECT org_orgid , org_name FROM tbl_organization";
$resultorg = mysqli_query($conn, $sqlorg);
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
    <title>: จัดการข้อมูลฝึกงาน :</title>
    <script src="script.js" type="text/javascript"></script>
</head>

<body onload="doviewdatainternship();">
    <div class="headerr">
        <div class="container headerText">
            <button onclick="javascript:location.href='admin_indexx.php'" name="gotoindex" type="submit" class="btn-danger btn-sm">
                < กลับหน้าหลัก</button>
                    <div>
                        <label class="sec">สวัสดี : <?php echo $_SESSION['uname']; ?></label>
                        <form action="admin_internshipcont.php" method="get">
                            <button name="logout" type="submit" class="btn-danger btn-sm">ออกจากระบบ</button>
                        </form>
                    </div>
        </div>
    </div>
    <div class="contentt">
        <div class="infocontent">
            <div class="left">
                <div id="showhere">
                    <!-- <table class="">
                        <thead>
                            <tr>
                                <td>AccountID</td>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Password</td>
                                <td>State</td>
                                <td>tools</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>45856</td>
                                <td>62114340032</td>
                                <td>kawin udom</td>
                                <td>1234</td>
                                <td>2</td>
                                <td>ลบ</td>
                        </tbody>
                    </table> -->
                </div>
            </div>
            <div class="right">
                <div class="formAddEditout">
                    <div class="formAddEditin" id="formshowhere">
                        <form action="admin_internshipcont.php" method="post">
                            <div class="mustinline row">
                                <div class="accid col-4">
                                    <label class="col-10" for="accid">Training ID : </label>
                                    <input value="" id="stdtn_id" name="stdtn_id" class="form-control" type="text" placeholder="Auto generate" readonly>
                                </div>
                                <div class="col-8">
                                    <label for="stdtn_status">Status : </label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="stdtn_status" id="stdtn_status_p" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Pass</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="stdtn_status" id="stdtn_status_in" value="2" checked>
                                        <label class="form-check-label" for="inlineRadio2">In Progress</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="stdtn_status" id="stdtn_status_f" value="3">
                                        <label class="form-check-label" for="inlineRadio2">Fail</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="mustinline row">
                        <div class="accid col-3">
                            <label class="col-10" for="stdtn_year">Train Year: </label>
                            <select class="form-control" name="stdtn_year" id="stdtn_year">
                                <option value="none">-- Select --</option>
                                <option value="2559">2559</option>
                                <option value="2560">2560</option>
                                <option value="2561">2561</option>
                                <option value="2562">2562</option>
                                <option value="2563">2563</option>
                                <option value="2564">2564</option>
                                <option value="2565">2565</option>
                                <option value="2566">2566</option>
                                <option value="2567">2567</option>
                                <option value="2568">2568</option>
                                <option value="2569">2569</option>
                                <option value="2570">2570</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <label for="stdtn_type">Training Type : </label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stdtn_type" id="stdtn_type_2" value="1" checked>
                                <label class="form-check-label" for="inlineRadio1">ฝึกงาน 2 เดือน</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stdtn_type" id="stdtn_type_4" value="2">
                                <label class="form-check-label" for="inlineRadio2">สหกิจ 4 เดือน</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <label for="stdtn_stdid">Student Name : </label>
                            <!-- <input value="" id="stdtn_stdid" name="stdtn_stdid" class="form-control" type="text" placeholder="Enter Student ID" required> -->
                            <select class="form-control" name="stdtn_stdid" id="stdtn_stdid">
                                <option value="none">-- กรุณาเลือก --</option>
                                <?php foreach ($sel_result3 as $rows) { ?>
                                    <option value="<?php echo $rows['std_stdid']; ?>">
                                        <?php echo $rows['std_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-16">
                            <label for="stdtn_id_name">Student Name : </label>
                            <input value="" id="stdtn_id_name" name="stdtn_id_name" class="form-control" type="text" placeholder="Enter student name" required readonly>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-16">
                            <label for="org_orgid">Org Name : </label>
                            <!-- <input value="" id="org_orgid" name="org_orgid" class="form-control" type="text" placeholder="Enter Org name" required> -->
                            <select class="form-control" name="org_orgid" id="org_orgid">
                                <option value="none">-- กรุณาเลือก --</option>
                                <?php foreach ($resultorg as $rows) { ?>
                                    <option value="<?php echo $rows['org_orgid']; ?>">
                                        <?php echo $rows['org_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-16">
                            <label for="stdtn_jobdesc">Job Desc : </label>
                            <input value="" id="stdtn_jobdesc" name="stdtn_jobdesc" class="form-control" type="text" placeholder="Description" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-16">
                            <label for="stdtn_reason">Reasson : </label>
                            <input value="" id="stdtn_reason" name="stdtn_reason" class="form-control" type="text" placeholder="Resone"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 addbtn">
                            <button name="savenow" onclick="return checksaveinternshipform()" type="submit" class="btn">เพิ่มข้อมูล</button>
                        </div>
                        <div class="col-4 editbtn">
                            <button name="updatenow" onclick="return checkupdateinternshipform()" type="submit" class="btn">อัพเดทข้อมูล</button>
                        </div>
                        <div class="col-4 cleanbtn">
                            <button onclick="cleanforminternship();" type="button" class="btn">ล้างฟอร์ม</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include_once("crud_aleart.php"); ?>
</body>

</html>