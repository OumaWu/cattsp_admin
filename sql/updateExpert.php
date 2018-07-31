<?php
define('FILE_UPLOAD_PATH', "{$_SERVER['DOCUMENT_ROOT']}/cattsp/user_files/expert/");
$url = "../expert_list.php";
$url2 = $_SERVER["HTTP_REFERER"];
$id = $_POST["id"];
$accountname = $_POST["accountname"];
$password = $_POST["password"];
$old_password = $_POST["old_password"];
$name = $_POST["name"];
$title = $_POST["title"];
$career_age = $_POST["career_age"];
$degree = $_POST["degree"];
$institute = $_POST["institute"];
$domain = $_POST["domain"];
$speciality = $_POST["speciality"];
$location = $_POST["location"];
$introduction = $_POST["introduction"];
$new_images = (string)$_FILES['photo']['name'];
$old_images = (string)$_POST['o_photo'];

if (!empty($accountname) && !empty($old_password) && !empty($name) && !empty($title) && isset($career_age) && !empty($degree)
    && !empty($institute) && !empty($domain) && !empty($speciality) && !empty($location) && !empty($introduction)) {

    include("connection.php");

    //如果输入了新密码，则加密；否则将原有密码赋给新密码变量
    if (empty($password)) {
        $password = $old_password;
    }
    else {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    // 上传修改的图片
    //如果文件名不为空，则加密文件名
    if ($new_images != null) {

        //获取后缀名
        $img_ext = substr($new_images, strrpos($new_images, '.'));

        // 加密图片名
        $new_images =  $accountname . hash_file('md5', $_FILES['photo']["tmp_name"]) .$img_ext;

        // 删除旧图片
        deleteOldImg($old_images);
    }
    else {
        // 如果是空的，则把旧的文件名传给它
        $new_images = $old_images;
    }

    $sql = "UPDATE `specialists`"
            ."SET `accountname` = '{$accountname}', `password` = '{$password}', `name` = '{$name}', `title` = '{$title}', "
            ."`career_age` = '{$career_age}', `degree` = '{$degree}', `institute` = '{$institute}',"
            ." `domain` = '{$domain}', `speciality` = '{$speciality}', `location` = '{$location}', "
            ."`introduction` = '{$introduction}', `photo` = '{$new_images}'"
            ." WHERE `specialists`.`id` = {$id}";
    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute() && uploadImg($new_images)) {
            $pdo->commit();
            echo "<script> alert('专家资料更新成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('专家资料更新失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url2}\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('请填必填信息！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url2}\">";
}

function uploadImg($new_images) {

    // 添加上传路径
    $file_path = FILE_UPLOAD_PATH .$new_images;

    // 上传新图片
    if (!file_exists($file_path)) {

        if (move_uploaded_file($_FILES['photo']["tmp_name"],  $file_path)) {
//            echo "图片" . $file_path . "上传成功！！" . "<br>";
            return true;
        }
        else return false;
    }
    return true;
}

function deleteOldImg($old_images) {
    // 删除旧图片
    $path = FILE_UPLOAD_PATH . $old_images;
    if (file_exists($path)) {
        if (unlink($path))
            return true;
        return false;
    }
    return true;
}

?>