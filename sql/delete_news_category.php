<?php
include_once('connection.php');
$url = "../info_category.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM `news_category` WHERE `id` = '{$id}'";
    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('删除新闻栏目成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('删除新闻栏目失败！！\\n' + '{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('没有接收到id！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}

?>