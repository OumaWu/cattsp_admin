<?php
/**
 * Created by PhpStorm.
 * User: Wjh
 * Date: 2018/7/31
 * Time: 9:55
 */
require_once("connection.php");

$url = $_SERVER["HTTP_REFERER"];

if (isset($_GET['q_id'])) {
    $id = $_GET['q_id'];

    $sql = "SELECT * FROM `question_view` WHERE `q_id` = {$id}";
    try {
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
        } else {
            echo "<script> alert('提取问题失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }

} else {
    echo "<script> alert('搜索的问题不存在！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}
?>