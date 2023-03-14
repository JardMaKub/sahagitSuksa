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
    <title>: จัดการข้อมูลบริษัท :</title>
    <script src="script.js" type="text/javascript"></script>
</head>

<body onload="doviewdataorgmanage();">
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
                        <form action="admin_orgmanagecont.php" method="post">
                            <div class="row">
                                <div class="col-5">
                                    <label for="orgid">NO. : </label>
                                    <input value="" id="orgid" name="orgid" class="form-control" type="text" placeholder="NO. Will auto generate" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <label for="orgorgid">Organize ID : </label>
                                        <input value="" id="orgorgid" name="orgorgid" class="form-control" type="text" placeholder="Enter Organize ID" required>
                                    </div>
                                    <div class="col-5">
                                        <label for="orgname">Organize Name : </label><br>
                                        <input value="" id="orgname" name="orgname" class="form-control" type="text" placeholder="Enter Organize Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <label for="orgadd">Address : </label>
                                        <input value="" id="orgadd" name="orgadd" class="form-control" type="textarea" placeholder="Enter Address" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <label for="orgprov">Province : </label>
                                        <select class="form-control" name="orgprov" id="orgprov">
                                            <option value="none">-- Select --</option>
                                            <option value="Ubonrachatani">Ubonrachatani</option>
                                            <option value="Surin">Surin</option>
                                            <option value="Bankkok">Bankkok</option>
                                            <option value="Konkhen">Konkhen</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <label for="orgcont">Name Contact : </label>
                                        <input value="" id="orgcont" name="orgcont" class="form-control" type="text"  placeholder="Enter Contact Name" required><br>
                                    </div>
                                    <div class="col-5">
                                        <label for="orgtel">Contact Tel : </label>
                                        <input value="" id="orgtel" name="orgtel" class="form-control" type="text" placeholder="Enter Contact Tel" required><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 addbtn">
                                        <button name="savenow" onclick="return checksaveorgmanageform()" type="submit" class="btn">เพิ่มข้อมูล</button>
                                    </div>
                                    <div class="col-3 editbtn">
                                        <button name="updatenow" onclick="return checkupdateorgmanageform()" type="submit" class="btn">อัพเดทข้อมูล</button>
                                    </div>
                                    <div class="col-3 cleanbtn">
                                        <button onclick="cleanformorgmanage();" type="button" class="btn">ล้างฟอร์ม</button>
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