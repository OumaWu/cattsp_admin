<?php

require_once ("./Page.class.php");

$p = empty($_GET["p"]) ? 1 : $_GET["p"];
$page = new Page("specialists", "id", 10, $p);

include("connection.php");

$url = $_SERVER["HTTP_REFERER"];

$sql = "SELECT * FROM `specialists`";

try {
    $result = $pdo->prepare($page->getOffsetAdded($sql));
    if ($result->execute()) {
     } else {
        echo "<script> alert('提取专家列表失败！！\\n{$pdo->errorInfo()}');</script>";
        echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>