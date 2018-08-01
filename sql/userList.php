<?php

require_once ("./Page.class.php");

$p = empty($_GET["p"]) ? 1 : $_GET["p"];
$page_user = new Page("users", "id", 10, $p);

include("connection.php");

$sql = "SELECT * FROM `users`";
try {
    $result = $pdo->prepare($page_user->getOffsetAdded($sql));
    if ($result->execute()) {
     } else {
        echo "<script> alert('提取账号列表失败！！\\n{$pdo->errorInfo()}');</script>";
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>