<?php

include("connection.php");

$url = $_SERVER["HTTP_REFERER"];

$sql = "SELECT policy.id, policy.title, policy.date, policy_category.title category "
        ."FROM `policy`, `policy_category` WHERE policy.category = policy_category.id "
        ."UNION SELECT policy.id, policy.title, policy.date, policy.category "
        ."FROM `policy` WHERE policy.category is NULL";
try {
    $result = $pdo->prepare($sql);
    if ($result->execute()) {
    } else {
        echo "<script> alert('提取政策法规列表失败！！\\n{$pdo->errorInfo()}');</script>";
        echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>