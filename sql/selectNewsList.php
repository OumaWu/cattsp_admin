<?php
include("connection.php");

$sql = "SELECT news.id, news.title, news.date, news_category.title category "
        ."FROM `news`, `news_category` WHERE news.category = news_category.id "
        ."UNION SELECT news.id, news.title, news.date, news.category "
        ."FROM `news` WHERE news.category is NULL";
try {
    $result = $pdo->prepare($sql);
    if ($result->execute()) {
//			echo "<script> alert('提取新闻列表成功！！');</script>";
    } else {
        echo "<script> alert('提取新闻列表失败！！');</script>";
        echo $pdo->errorInfo();
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>