<?php
include_once('connection.php');

$sql = "SELECT * FROM `news_category`";
try {
    $result = $pdo->prepare($sql);
    if ($result->execute()) {
    } else {
        echo "<script> alert('提取新闻栏目列表失败！！');</script>";
        echo $pdo->errorInfo();
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>