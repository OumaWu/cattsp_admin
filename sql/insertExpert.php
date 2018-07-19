<?php
define('FILE_UPLOAD_PATH', "{$_SERVER['DOCUMENT_ROOT']}/cattsp/user_files/expert/");
$url = "../expert_list.php";
$url2 = $_SERVER["HTTP_REFERER"];
$accountname = $_POST["accountname"];
$password = $_POST["password"];
$name = $_POST["name"];
$title = $_POST["title"];
$location = $_POST["location"];
$career_age = $_POST["career_age"];
$degree = $_POST["degree"];
$institute = $_POST["institute"];
$domain = $_POST["domain"];
$speciality = $_POST["speciality"];
$introduction = $_POST["introduction"];
$photo = (string)$_FILES['photo']['name'];


if (!empty($accountname) && !empty($password) && !empty($name) && !empty($title) && !empty($location) && !empty($career_age)
    && !empty($degree) && !empty($institute) && !empty($domain) && !empty($speciality) && !empty($introduction)
    && !empty($photo)){

    include("connection.php");

    //加密密码
    $password = password_hash($password, PASSWORD_DEFAULT);

    //加密图片
    //获取后缀名
    $img_ext = substr($photo, strrpos($photo, '.'));

    // 加密图片名
    $photo = $accountname . hash_file('md5', $_FILES['photo']["tmp_name"]) . $img_ext;

    $sql = "INSERT INTO `specialists` (`id`, `accountname`, `password`, `name`, `title`, "
        ."`location`, `career_age`, `degree`, `institute`, `domain`, `speciality`, `introduction`, `photo`) "
        . "VALUES (NULL, '{$accountname}', '{$password}', '{$name}', '{$title}', '{$location}', '{$career_age}', "
        ."'{$degree}', '{$institute}', '{$domain}', '{$speciality}', '{$introduction}', '{$photo}')";
    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute() &&uploadImg($photo) ) {
            $pdo->commit();
            echo "<script> alert('添加专家账号成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('添加专家账号失败！！\\n{$pdo->errorInfo()}');</script>";
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
        }
    }
    return false;
}

?>