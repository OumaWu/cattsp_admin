<?php
/**
 * Created by PhpStorm.
 * User: Derek
 * Date: 2018/7/31
 * Time: 7:54
 */
require_once("connection.php");

$url = $_SERVER["HTTP_REFERER"];

$sql = "SELECT `q_id`, `title`, `u_account`, `user`, `spe_account`, `expert`, `time` FROM `question_view`";

try {
    $result = $pdo->prepare($sql);
    if ($result->execute()) {
    } else {
        echo "<script> alert('提取问题列表失败！！\\n{$pdo->errorInfo()}');</script>";
//        echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}
?>