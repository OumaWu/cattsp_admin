<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 2018/3/30
 * Time: 19:32
 */
include("connection.php");

$sql = "SELECT `id`, `accountname` FROM `users`";
try {
    $result = $pdo->prepare($sql);
    if ($result->execute()) {
    } else {
        echo "<script> alert('提取用户名列表失败！！\\n{$pdo->errorInfo()}');</script>";
        echo "<meta http-equiv=\"refresh\" content=\"0.5;url=#\">";
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}


?>