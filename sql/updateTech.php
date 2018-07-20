<?php
/**
 * Created by PhpStorm.
 * User: wlssvr01
 * Date: 2018/7/5
 * Time: 9:54
 */
define('FILE_UPLOAD_PATH', "{$_SERVER['DOCUMENT_ROOT']}/cattsp/user_files/");
include("connection.php");
$id = $_POST['id'];
$url = "../tech_list.php";
$url2 = $_SERVER['HTTP_REFERER']."?id={$id}";

if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["user_name"]  && !empty($_POST["user_id"]))
    && !empty($_POST["location"]) && !empty($_POST["email"]) && !empty($_POST["entreprise"]) && !empty($_POST["publisher"])) {

    $title = $_POST["title"];
    $description = $_POST["description"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $entreprise = $_POST["entreprise"];
    $publisher = $_POST["publisher"];
    $userid = $_POST["user_id"];
    $user = $_POST["user_name"];

    include("connection.php");

    $old_images = array($_POST['o_img1'], $_POST['o_img2'], $_POST['o_img3'], $_POST['o_img4'], $_POST['o_img5']);
    $new_images = array();
    $delete_images = array();

    $count = 0;
    // 上传修改的图片
    foreach ($_FILES as $file) {

        //如果文件名不为空，则加密文件名
        if ($file['name'] != null) {

            //获取后缀名
            $img_ext = substr($file['name'], strrpos($file['name'], '.'));

            // 加密图片名
            $file['name'] =  $user . $userid . hash_file('md5', $file["tmp_name"]) .$img_ext;

            // 将加密后的图片名添加至数组中
            array_push($new_images, $file['name']);
            // 将要删除的旧图片名加入删除数组中
            array_push($delete_images, $old_images[$count]);

            // 添加上传路径
            $file_path = FILE_UPLOAD_PATH .$file['name'];

            // 上传新图片
            if (!file_exists($file_path)) {
                if (move_uploaded_file($file["tmp_name"],  $file_path));
//                    echo "图片" . $file_path . "上传成功！！" . "<br>";

            }
        }
        else {
            // 如果是空的，则把旧的文件名传给它
            array_push($new_images, $old_images[$count] ? $old_images[$count] : null);
        }
        $count++;
    }

    // 删除旧图片
    foreach ($delete_images as $images) {
        $path = FILE_UPLOAD_PATH . $images;
        if (file_exists($path)) {
            unlink($path);
        }
    }

    $sql = "UPDATE `solar_technologies`"
        . " SET `title` = '{$title}', `entreprise` = '{$entreprise}', `publisher` = '{$publisher}', `location` = '{$location}', `email` = '{$email}', `userid` = '{$userid}'"
        ." ,`image1` = '{$new_images[0]}', `image2` = '{$new_images[1]}', `image3` = '{$new_images[2]}', `image4` = '{$new_images[3]}', `image5` = '{$new_images[4]}'"
        . " WHERE `solar_technologies`.`id` = {$id}";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('技术成果修改成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('技术成果修改失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url2}\">";
        }

    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('请填必填信息！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url2}\">";
}