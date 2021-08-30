<?php
/**
 * Created by PhpStorm.
 * User: Wjh
 * Date: 2018/3/30
 * Time: 19:32
 */
include("connection.php");
$url = "../user_list.php#admins";
$id = $_GET["id"];

if (!empty($id)) {

    $sql = "SELECT * FROM `admin` where id = $id";
    try {
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
        } else {
            echo "<script> alert('提取管理员资料失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else{
    echo "<script> alert('管理员账号不存在！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
}

?>