<?php
define('FILE_UPLOAD_PATH', "{$_SERVER['DOCUMENT_ROOT']}/user_files/avatar/");
$url = "../user_list.php";
$url2 = $_SERVER["HTTP_REFERER"];
$accountname = $_POST["accountname"];
$password = $_POST["password"];
$realname = $_POST["realname"];
$sex = $_POST["sex"];
$tel = $_POST["tel"];
$email = $_POST["email"];
$location = $_POST["location"];
$address = $_POST["address"];
$photo = (string)$_FILES['photo']['name'];


if (!empty($accountname) && !empty($password) && !empty($realname) && isset($sex) && !empty($tel)
    && !empty($email) && !empty($location) && !empty($address)){

    include("connection.php");

    //加密密码
    $password = password_hash($password, PASSWORD_DEFAULT);

    if(!empty($photo)) {
        //获取后缀名
        $img_ext = substr($photo, strrpos($photo, '.'));

        // 加密图片名
        $photo = $accountname . hash_file('md5', $_FILES['photo']["tmp_name"]) . $img_ext;
    }


    $sql = "INSERT INTO `users` (`id`, `accountname`, `realname`, `password`, `sex`, `tel`, `email`,"
        ." `location`, `address`, `photo`) "
        . "VALUES (NULL, '{$accountname}', '{$realname}', '{$password}', '{$sex}', '{$tel}', '{$email}', "
        ."'{$location}', '{$address}', '{$photo}')";
    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute() && uploadImg($photo) ) {
            $pdo->commit();
            echo "<script> alert('添加企业账号成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('添加企业账号失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url2}\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('请填必填信息！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url2}\">";
}

// 上传图片
function uploadImg($photo) {

    //如果文件名不为空，则上传
    if ($photo != null) {

        // 添加上传路径
        $file_path = FILE_UPLOAD_PATH . $photo;

        // 上传新图片
        if (!file_exists($file_path)) {
            if (move_uploaded_file($_FILES['photo']["tmp_name"], $file_path)) {
//                echo "图片" . $file_path . "上传成功！！" . "<br>";
                return true;
            }
            return false;
        }
    }
    return true;
}

?>