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
    <title>: ค้นหาข้อมูลฝึกงาน :</title>
    <script src="script.js" type="text/javascript"></script>
    
</head>
<style>
        table {
            width: 100%;
            /* 140px * 5 column + 16px scrollbar width */
            border-spacing: 0;
            /* margin-left: 1em; */
            margin-top: 1em;
        }

        tbody,
        thead tr {
            display: block;
        }

        tbody {
            height: 80vh;
            overflow-y: auto;
            overflow-x: hidden;
        }

        tbody td,
        thead td {
            width: 10em;
            padding-top: 0.4em;
            padding-bottom: 0.4em;
        }

        thead td {
            background-color: #148D8D;
            text-align: center;
            color: #f4f4f4;
        }

        tbody td {
            background-color: gainsboro;
            color: #333333;
            text-align: center;
            border-bottom: 2px solid #333333;
        }

        thead th:last-child {
            width: 156px;
            /* 140px + 16px scrollbar width */
        }
    </style>

<body onload="">
    <div class="headerr">
        <div class="container headerText">
            <button onclick="javascript:location.href='admin_indexx.php'" name="gotoindex" type="submit" class="btn-danger btn-sm">
                < กลับหน้าหลัก</button>
                    <div class="searchdiv row">
                        <div class="col-5">
                            <input value="" id="searchin" name="searchin" class="form-control" type="text" placeholder="Search keyword">
                        </div>
                        <div class="col-5">
                            <select class="form-control" name="soption" id="soption">
                                <option value="none" disabled selected>- Search Option -</option>
                                <option value="stdname">Student name</option>
                                <option value="orgname">Organization name</option>
                                <option value="train_years">Train years (พ.ศ.)</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <input type="button" value="Search" name="searchnow" class="btn-success btn-sm" onclick="return search_get()">
                        </div>
                    </div>
                    <div>
                        <label class="sec">สวัสดี : <?php echo $_SESSION['uname']; ?></label>
                        <form action="admin_internshipcont.php" method="get">
                            <button name="logout" type="submit" class="btn-danger btn-sm">ออกจากระบบ</button>
                        </form>
                    </div>
        </div>
    </div>
    <div class="contentt ">
        <div class="container justify-content-center">
            <div id="showsearch">
                <!-- <table class="">
                    <thead>
                        <tr>
                            <td>Train Years</td>
                            <td>Student Name</td>
                            <td>Org Name</td>
                            <td>Train Type</td>
                            <td>Job Description</td>
                            <td>Train State</td>
                            <td>Train Note</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2560</td>
                            <td>kawin udom</td>
                            <td>memark Co.</td>
                            <td>สหกิจ</td>
                            <td>เดินสายเเลน</td>
                            <td>Inprogress</td>
                            <td>มามามา</td>
                    </tbody>
                </table> -->
            </div>

        </div>
    </div>
    </div>
    <?php include_once("crud_aleart.php"); ?>
</body>

</html>