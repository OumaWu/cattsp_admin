<?php
include("connection.php");
//$url_home = "../home.php";
$url = "../login.php";

if (checkVCode()) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `admin` WHERE `username` = '$username'";

        try {
            $result = $pdo->prepare($sql);
            $result->execute();
            $rows = $result->rowCount();

            if ($rows > 0) {

                $res = $result->fetch(PDO::FETCH_OBJ);
                $password_hash = $res->password;

                if(password_verify($password, $password_hash)) {

                    $_SESSION['user'] = $res->accountname;
                    $_SESSION['userid'] = $res->id;
                    $_SESSION['expiretime'] = time() + 6000; // 刷新时间戳，1小时40分钟
                    echo "<script>alert('登录成功！')</script>";
//                echo "<meta http-equiv=\"refresh\" content=\"0;url=$url_home\">";
                }
                else {
                    echo "<script>alert('用户名或密码错误，请重新输入！')</script>";
                    echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
                }

            } else {
                echo "<script>alert('用户名或密码错误，请重新输入！')</script>";
                echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
            }

        } catch (PDOException $e) {
            die("错误!!: " . $e->getMessage() . "<br>");
        }
    } else {
        echo "<script>alert('请输入用户名或密码！')</script>";
        echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
    }
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=$url\">";
}

//校验验证码
function checkVCode() {
    session_start();
    $checkword = $_POST['checkword'];

    if (empty($checkword)) {
        echo "<script>alert('请输入验证码！')</script>";
        return false;
    }

    else if ($checkword != $_SESSION["yzm_code"]) {
        echo "<script>alert('验证码错误！')</script>";
        return false;
    }

    return true;
}
?>