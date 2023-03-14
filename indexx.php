<?php
session_start();
session_id();
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
    <title>: ระบบจัดการนักศึกษาสหกิจ :</title>
</head>

<body>
    <div class="headerr">
        <div class="container headerText">
            <h3 class="main">ระบบจัดการนักศึกษาสหกิจ</h3>
            <h3 class="sec">หน้าหลัก</h3>
        </div>
    </div>
    <div class="contentt">
        <div class="container justify-content-center">
            <div class="realcontent">
                <h2 class="text-center">Sign in now</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="username">รหัสนักศึกษา : </label>
                    <input type="text" name="user" id="user" class="form-control" placeholder="รหัสนักศึกษา หรือ อาจารย์" require autofocus>
                    <label for="username">รหัสผ่าน : </label>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="รหัสผ่าน" require>
                    <button name="loginnow" type="submit" class="btn btn-outline-light btn-lg butttlogin">Signin</button>
                    <button name="regisnow" type="submit" class="btn btn-outline-info btn-lg butttlogin">Signup</button>
                </form>
            </div>
        </div>
    </div>
    <script src="./script.js" type=""></script>
</body>
<?php
if (isset($_GET["regisnow"])) {
    header("Location: page_reg.php");
}
if (isset($_GET["user"]) && isset($_GET["pass"]) && isset($_GET["loginnow"])) {
    include_once("DBconnect.php");
    $user = $_GET["user"];
    $pass = $_GET["pass"];
    $sql = "SELECT * FROM tbl_account WHERE acc_stdid = \"$user\" AND acc_pass = \"$pass\"";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    $temt = mysqli_fetch_assoc($result);
    if ($temt != null) {
        // echo $temt["acc_name"];
        $_SESSION['uname'] = $temt["acc_name"];
        $_SESSION['state'] = $temt["acc_state"];
        $_SESSION['userid'] = $temt["acc_stdid"];
        $_SESSION['logon'] = true;
        if ($temt["acc_state"] == 1) {
            header("Location: admin_indexx.php");
        } elseif ($temt["acc_state"] == 2) {
            header("Location: std_index.php");
        }
    } else {
        echo "<script>loginfaile()</script>";
    }
}
?>

</html>