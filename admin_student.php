<?php session_start();
if (($_SESSION['logon'] != true) || ($_SESSION['state'] != "1")) {
    header("Location: indexx.php");
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
    <title>: จัดการข้อมูลนักศึกษา :</title>
    <script src="script.js" type="text/javascript"></script>
</head>

<body onload="doviewstd();">
    <div class="headerr">
        <div class="container headerText">
            <button onclick="javascript:location.href='admin_indexx.php'" name="gotoindex" type="submit" class="btn-danger btn-sm">
                < กลับหน้าหลัก</button>
                    <div>
                        <label class="sec">สวัสดี : <?php echo $_SESSION['uname']; ?></label>
                        <form action="admin_accmanagecont.php" method="get">
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
                        <form action="admin_studentcont.php" method="post">
                            <div class="mustinline row">
                                <div class="std_id col-8">
                                    <label for="std_id">ID : </label>
                                    <input value="" id="std_id" name="std_id" class="form-control" type="text" placeholder="Auto generate" readonly>
                                </div>
                                <div class="col-4">
                                    <label for="std_type">Student type : </label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="std_type" id="std_type_1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">2 ปีต่อเนื่อง</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="std_type" id="std_type_2" value="2" checked>
                                        <label class="form-check-label" for="inlineRadio2">4 ปีปกติ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <label for="std_stdid">Studen ID : </label>
                                    <input value="" id="std_stdid" name="std_stdid" class="form-control" type="text" placeholder="Enter ID Student" required>
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
                                <div class="col-16">
                                    <label for="std_name">Student Name : </label>
                                    <input value="" id="std_name" name="std_name" class="form-control" type="text" placeholder="Enter name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-16">
                                    <label for="std_tel">Studen Telephone : </label>
                                    <input value="" id="std_tel" name="std_tel" class="form-control" type="text" placeholder="Enter Numberphone" required><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 addbtn">
                                    <button name="savenow" onclick="return checksavestd()" type="submit" class="btn">เพิ่มข้อมูล</button>
                                </div>
                                <div class="col-4 editbtn">
                                    <button name="updatenow" onclick="return checkupdatestd()" type="submit" class="btn">อัพเดทข้อมูล</button>
                                </div>
                                <div class="col-4 cleanbtn">
                                    <button onclick="cleanformstd();" type="button" class="btn">ล้างฟอร์ม</button>
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