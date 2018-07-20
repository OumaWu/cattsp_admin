<?php
define('FILE_UPLOAD_PATH', "{$_SERVER['DOCUMENT_ROOT']}/cattsp/user_files/");
include("connection.php");
$url = "../tech_list.php";
$url2 = $_SERVER["HTTP_REFERER"];

if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["publisher"] && !empty($_POST["user_name"]))
    && !empty($_POST["location"]) && !empty($_POST["entreprise"]) && !empty($_POST["user_id"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $entreprise = $_POST["entreprise"];
    $publisher = $_POST["publisher"];
    $userid = $_POST["user_id"];
    $user = $_POST["user_name"];

    $sql = "INSERT INTO `solar_technologies` (`id`, `title`, `entreprise`, `publisher`, `location`, `email`, `description`, `date`, `userid`)"
        . " VALUES (NULL, '$title', '$entreprise', '$publisher', '$location', '$email', '$description', now(), '$userid')";

    try {

        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        //执行插入语句
        if ($result->execute()) {

            //获取新插入的技术成果id
            $last_id = $pdo->lastInsertId();

            //储存文件名的数组
            $images = array();

            //如果上传图片成功，则修改数据库图片名
            if (uploadImg($user, $last_id,$images)) {

                //改名成功，则提交事务
                if (modifyImgName($pdo, $images, $last_id)) {
                    $pdo->commit();
                    echo "<script> alert('发布太阳能技术成功！！');</script>";
                    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
                }
                //改名失败则回滚
                else {
                    $pdo->rollBack();
                    echo "<script> alert('发布太阳能技术失败！！');</script>";
                  echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
                }
            }
            //上传失败则回滚
            else {
                $pdo->rollBack();
                echo "<script> alert('发布太阳能技术失败！！');</script>";
                  echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
            }

        } else {
            echo "<script> alert('发布太阳能技术失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
        }

    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('请填必填信息！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
}

function modifyImgName($pdo, $images, $last_id)
{
    $sql = "UPDATE `solar_technologies`"
        . " SET `image1` = '$images[0]', `image2` = '$images[1]', `image3` = '$images[2]', `image4` = '$images[3]', `image5` = '$images[4]'"
        . "WHERE `solar_technologies`.`id` = $last_id";

    try {
        $result = $pdo->prepare($sql);
        //执行插入语句
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
}

function uploadImg($user, $last_id, &$images)
{

    $success = false;
    $path = FILE_UPLOAD_PATH;

    //如果文件夹不存在则创建它
//    if (!file_exists($path)) {
//        mkdir($path, 0777, true);
//    }

    // 给图片名前添加上传路径，并上传
    foreach ($_FILES as $file) {
        //如果文件名不为空，则加上上传路径
        if ($file['name'] != null) {

            $file_path = $path . $file['name'];

            //如果图片不存在，则上传
            if (!file_exists($file_path)) {
                if (move_uploaded_file($file["tmp_name"], $file_path)) {

                    //获取后缀名
                    $img_ext = substr($file['name'], strrpos($file['name'], '.'));

                    //根据图片内容生成一个哈希字串
                    $img_hash_name = hash_file('md5', $file_path) . $img_ext;

                    //用生成的哈希字串和用户名以及技术成果id生成一个新的加密文件名
                    $img_hash_name =  $user . $last_id . $img_hash_name;

                    //将上传的图片改名为加密文件名
                    rename($file_path,$path .$img_hash_name);

                    //将生成的加密文件名存至数组
                    array_push($images, $img_hash_name);

                    $success = true;
                } else {
                    $success = false;
                }
            }
        }
    }

    return $success;
}

?>