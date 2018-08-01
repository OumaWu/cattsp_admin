<?php

require_once ("./Page.class.php");

$p = empty($_GET["p"]) ? 1 : $_GET["p"];
$page_admin = new Page("admin", "id", 10, $p);

include("connection.php");

$sql = "SELECT * FROM `admin`";
try {
    $result = $pdo->prepare($page_admin->getOffsetAdded($sql));
    if ($result->execute()) {
     } else {
        echo "<script> alert('提取账号列表失败！！\\n{$pdo->errorInfo()}');</script>";
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>