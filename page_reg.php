<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" href="https://i.ibb.co/2sFrKKd/cri.png"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Athiti:wght@300;400&display=swap" rel="stylesheet">
    <script src="./script.js" type="text/javascript"></script>
    <link href="style.css" rel="stylesheet">
    <title>: ระบบจัดการนักศึกษาสหกิจ :</title>
</head>

<style>
    body {
        background-color: #0E2C40;
    }

    .regis {
        color: #f3f3f3;
    }
    .headdd{
        background-color: khaki;
    }
    .regis {
        margin-top: 1.3em;
    }

    .regis.form-reg {
        width: 40rem;
        padding: 2rem;
    }

    .form_inp {
        padding-left: 3rem;
        padding-right: 3rem;
    }

    .page-footer {
        margin-top: 4.1rem;
    }
</style>

<body>
    <div class="page">

        <!-- head -->
        <div class="container-fluid p-5 text-center headdd">
            <h1>ระบบจัดการนักศึกษาสหกิจ</h1>
        </div>
        <!-- form register -->
        <div class="container regis">
            <form class="form-reg" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <div class="h3">
                        <h3>Sign Up</h3>
                    </div>
                    <div class="card-body form_inp">
                        <label for="username">Username :</label>
                        <input type="number" name="username" id="username" placeholder="รหัสนักศึกษา" class="input form-control" autocomplete="off" required autofocus><br>
                        <label for="password">Password :</label>
                        <input type="password" name="password" id="password" placeholder="รหัสผ่าน" class="input form-control" autocomplete="off" required><br>
                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name" placeholder="ชื่อ - นามสกุล ที่จะแสดงเมื่อเขเาสู่ระบบ" class="input form-control" autocomplete="off" required><br>

                        <!-- submit -->
                        <input type="" onclick="javascript:location.href='indexx.php'" name="goback" value="Go Back" class="btn btn-lg btn-danger submit" />
                        <input type="submit" name="regis" value="Sign up" class="btn btn-lg btn-success btn-block submit" />
                    </div>
                </div>
            </form>

        </div>
        <br>
        <!-- Back to main page -->
        <!-- <div class="cnt gray h4"><a href="./page0.php">Back to main page</a></div> -->

        <!-- footer -->
        <!-- <footer class="page-footer fixed-bottom" style="background-color: #333;">
            <div class="container footer-copyright text-center py-3" style="color: rgb(180, 180, 180);">
                <p class="fs-6">Copyright &copy; 2021 | 1143106-59 WEB PROGRAMING </p>
                <a>INTERNSHIP INFORMATION MANAGEMENT SYSTEM</a>
            </div>
        </footer> -->
        <!-- end footer -->

    </div>

</body>
<?php
if (isset($_POST["username"]) && (strlen(trim($_POST["username"])) != 11)) {
    echo "<script>showaleart(\"Plese use student ID 11 digit\")</script>";
}
if (
    isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["name"]) &&
    (strlen(trim($_POST["username"])) == 11 && isset($_POST["username"]))
) {
    include_once("DBconnect.php");
    $stid = $_POST["username"];
    $pass  = $_POST["password"];
    $nam  = $_POST["name"];
    $stat  = "2";


    $sql = "INSERT INTO tbl_account(acc_id,acc_stdid,acc_name,acc_pass,acc_state) ";
    $sql .= " VALUES (NULL, '$stid', '$nam','$pass','$stat');";

    if (mysqli_query($conn, $sql)) {
        echo "<script>showaleart(\"Create account complete\")</script>";
        header("Location: indexx.php");
    } else {
        echo "<script>showaleart(\"Student ID is Duplicate!!! Plese try again or contact admin\")</script>";
    }
    mysqli_close($conn);
}

?>

</html>