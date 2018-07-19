<?php
define('FILE_UPLOAD_PATH', "../user_files/expert/");
$userid = $_POST["userid"];
$user = $_POST["user"];
$url = "../specialist_profile.php";
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

var_dump($_FILES, $new_images, $old_images);

if (!empty($name) && !empty($title) && isset($career_age) && !empty($degree)
    && !empty($institute) && !empty($domain) && !empty($speciality) && !empty($location) && !empty($introduction)) {

    include("connection.php");

    // 上传修改的图片
    //如果文件名不为空，则加密文件名
    if ($new_images != null) {

        //获取后缀名
        $img_ext = substr($new_images, strrpos($new_images, '.'));

        // 加密图片名
        $new_images =  $user . hash_file('md5', $_FILES['photo']["tmp_name"]) .$img_ext;

        // 添加上传路径
        $file_path = FILE_UPLOAD_PATH .$new_images;

        // 上传新图片
        if (!file_exists($file_path)) {
            if (move_uploaded_file($_FILES['photo']["tmp_name"],  $file_path)) {

                echo "图片" . $file_path . "上传成功！！" . "<br>";

                // 删除旧图片
                $path = FILE_UPLOAD_PATH . $old_images;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
    }
    else {
        // 如果是空的，则把旧的文件名传给它
        $new_images = $old_images;
    }

    $sql = "UPDATE `specialists`"
            ."SET `name` = '$name', `title` = '$title', `career_age` = '$career_age', `degree` = '$degree', `institute` = '$institute',"
            ." `domain` = '$domain', `speciality` = '$speciality', `location` = '$location', `introduction` = '$introduction', `photo` = '{$new_images}'"
            ." WHERE `specialists`.`id` = $userid";
    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('你的资料更新成功！！');</script>";
//            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('你的资料更新失败！！');</script>";
            echo $pdo->errorInfo();
//            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('请填必填信息！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
}

?>