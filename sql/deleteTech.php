<?php
session_start();
define('FILE_UPLOAD_PATH', "{$_SERVER['DOCUMENT_ROOT']}/user_files/");
include("connection.php");
$url = "../tech_list.php";
$id = $_GET["id"];

/* 删除数据sql */
if (!empty($id)) {
    try {

        $sql = "SELECT * FROM `solar_technologies` WHERE `id` = $id";
        $sql2 = "DELETE FROM `solar_technologies` WHERE `id` = $id";

        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);

        //先把图片名字取出来
        if ($result->execute()) {

            //然后执行语句删除数据库中的条目
            $res = $result->fetch(PDO::FETCH_OBJ);
            $images = array($res->image1, $res->image2, $res->image3, $res->image4, $res->image5);

            $result = $pdo->prepare($sql2);

            // 如果数据库中的条目删除成功，则开始删除图片文件
            if ($result->execute()) {

                //然后删除用户对应的图片文件目录
                foreach ($images as $image) {

                    $file_path = FILE_UPLOAD_PATH .$image;

                    if (file_exists($file_path)) {
                        unlink("$file_path");
                    }
                }
                $pdo->commit();
                echo "<script> alert('删除成功！！');</script>";
                echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
            }
            //删除失败则回滚
            else {
                $pdo->rollBack();
                echo "<script> alert('删除失败！！');</script>";
                echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
            }

        } else {
            echo "<script> alert('删除失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        }

    } catch (PDOException $e) {
        die("Error!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('没有接收到ID！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}

?>