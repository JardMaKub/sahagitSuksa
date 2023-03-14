<?php session_start();
if (($_SESSION['logon'] != true) || ($_SESSION['state'] != "1")) {
    header("Location: indexx.php");
}
include_once("DBconnect.php");

$query = "SELECT tbl_organization.org_prov , count(*) as number FROM
         tbl_internship,tbl_organization WHERE tbl_internship.org_orgid = tbl_organization.org_orgid 
         GROUP BY tbl_organization.org_prov;";
$result = mysqli_query($conn, $query);

$query2 = "SELECT tbl_internship.stdtn_type,tbl_stdntype.type_name , count(*) as number 
FROM tbl_internship,tbl_organization,tbl_stdntype 
WHERE tbl_internship.org_orgid = tbl_organization.org_orgid AND tbl_internship.stdtn_type = tbl_stdntype.type_id
GROUP BY tbl_internship.stdtn_type;";
$result2 = mysqli_query($conn, $query2);
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="script.js" type="text/javascript"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['org_prov', 'Number'],
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "['" . $row["org_prov"] . "', " . $row["number"] . "],";
                }
                ?>
            ]);
            var options = {
                // is3D:true,  
                pieHole: 0.4,
                backgroundColor: "transparent",
                legend: {
                    position: 'right',
                    textStyle: {
                        color: 'white',
                        fontSize: 16
                    }
                },
                pieSliceBorderColor:"transparent",
                chartArea: {width: 500, height: 400}
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieleft'));
            chart.draw(data, options);
        }

        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
                ['type_name', 'Number'],
                <?php
                while ($row = mysqli_fetch_array($result2)) {
                    echo "['" . $row["type_name"] . "', " . $row["number"] . "],";
                }
                ?>
            ]);
            var options = {
                // is3D:true,  
                pieHole: 0.4,
                backgroundColor: "transparent",
                legend: {
                    position: 'right',
                    textStyle: {
                        color: 'white',
                        fontSize: 16
                    }
                },
                pieSliceBorderColor:"transparent",
                chartArea: {width: 500, height: 400}
            };
            var chart = new google.visualization.PieChart(document.getElementById('pieright'));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
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
        <div class="container" style="padding-top: 6em;">
            <div class="left">
                <div class="">
                    <div id="pieleft" style="color: white;"></div>
                </div>
            </div>
            <div class="right">
                <div class="">
                    <div id="pieright" style="color: white;"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("crud_aleart.php"); ?>
</body>

</html>