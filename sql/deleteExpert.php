<?php
include("connection.php");
define('FILE_UPLOAD_PATH', "{$_SERVER['DOCUMENT_ROOT']}/user_files/expert/");
$url = "../expert_list.php";
$url2 = $_SERVER["HTTP_REFERER"];
$id = $_GET["id"];

/* 删除数据sql */
if (!empty($id)) {
    try {

        $sql = "SELECT `photo` FROM `specialists` WHERE `id` = $id";
        $sql2 = "DELETE FROM `specialists` WHERE `id` = $id";

        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);

        //先把图片名字取出来
        if ($result->execute()) {

            //然后执行语句删除数据库中的条目
            $res = $result->fetch(PDO::FETCH_OBJ);
            $photo = $res->photo;

            $result = $pdo->prepare($sql2);

            // 如果数据库中的条目删除成功，则开始删除图片文件
            if ($result->execute()) {

                //然后删除用户对应的图片文件目录
                $file_path = FILE_UPLOAD_PATH . $photo;
                if (file_exists($file_path)) {
                    unlink("$file_path");
                }

                $pdo->commit();
                echo "<script> alert('删除成功！！');</script>";
                echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
            } else {
                $pdo->rollBack();
                echo "<script> alert('删除失败！！');</script>";
                echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
            }

        } else {
            $pdo->rollBack();
            echo "<script> alert('删除失败！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
        }

    } catch (PDOException $e) {
        die("Error!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('没有接收到ID！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
}

?>