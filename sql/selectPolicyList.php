<?php
include("connection.php");

$sql = "SELECT policy.id, policy.title, policy.date, policy_category.title category "
        ."FROM `policy`, `policy_category` WHERE policy.category = policy_category.id "
        ."UNION SELECT policy.id, policy.title, policy.date, policy.category "
        ."FROM `policy` WHERE policy.category is NULL";
try {
    $result = $pdo->prepare($sql);
    if ($result->execute()) {
//			echo "<script> alert('提取新闻列表成功！！');</script>";
    } else {
        echo "<script> alert('提取政策法规列表失败！！');</script>";
        echo $pdo->errorInfo();
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>