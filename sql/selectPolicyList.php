<?php

require_once ("./Page.class.php");

$p = empty($_GET["p"]) ? 1 : $_GET["p"];
$page = new Page("policy", "id", 10, $p);

include("connection.php");

$url = $_SERVER["HTTP_REFERER"];

$sql = "SELECT policy.id, policy.title, policy.date, policy_category.title category "
        ."FROM `policy`, `policy_category` WHERE policy.category = policy_category.id";
try {
    $result = $pdo->prepare($page->getOffsetAdded($sql));
    if ($result->execute()) {
    } else {
        echo "<script> alert('提取政策法规列表失败！！\\n{$pdo->errorInfo()}');</script>";
        echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>