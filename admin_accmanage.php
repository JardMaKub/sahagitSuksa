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
    <title>: จัดการผู้เข้าใช้งาน :</title>
    <script src="script.js" type="text/javascript"></script>
</head>

<body onload="doviewdataaccmanage();">
    <div class="headerr">
        <div class="container headerText">
            <button onclick="javascript:location.href='admin_indexx.php'" name="gotoindex" type="submit" class="btn-danger btn-sm">
                < กลับหน้าหลัก</button>
                    <div>
                        <h2 style="color: red;">** ห้ามลบ Admin ออกจนหมด **</h2>
                    </div>
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
                        <form action="admin_accmanagecont.php" method="post">
                            <div class="mustinline row">
                                <div class="accid col-8">
                                    <label for="accid">Account ID : </label>
                                    <input value="" id="accid" name="accid" class="form-control" type="text" placeholder="Account ID Will auto generate" readonly>
                                </div>
                                <div class="col-2">
                                    <label for="accstd">State : </label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="accstate" id="accstatead" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="accstate" id="accstatestd" value="2" checked>
                                        <label class="form-check-label" for="inlineRadio2">Student</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-16">
                                    <label for="accstid">ID : </label>
                                    <input value="" id="accstid" name="accstid" class="form-control" type="text" placeholder="Enter ID for username" required><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-16">
                                    <label for="accname">Name : </label>
                                    <input value="" id="accname" name="accname" class="form-control" type="text" placeholder="Enter name" required><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-16">
                                    <label for="accpass">Password : </label>
                                    <input value="" id="accpass" name="accpass" class="form-control" type="text" placeholder="Enter Password" required><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 addbtn">
                                    <button name="savenow" onclick="return checksaveaccmanageform()" type="submit" class="btn">เพิ่มข้อมูล</button>
                                </div>
                                <div class="col-4 editbtn">
                                    <button name="updatenow" onclick="return checkupdateaccmanageform()" type="submit" class="btn">อัพเดทข้อมูล</button>
                                </div>
                                <div class="col-4 cleanbtn">
                                    <button onclick="cleanformaccmanage();" type="button" class="btn">ล้างฟอร์ม</button>
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