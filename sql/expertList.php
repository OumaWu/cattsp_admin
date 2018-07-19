<?php
include("connection.php");

$sql = "SELECT * FROM `specialists`";
try {
    $result = $pdo->prepare($sql);
    if ($result->execute()) {
     } else {
        echo "<script> alert('提取专家列表失败！！\\n{$pdo->errorInfo()}');</script>";
        echo $pdo->errorInfo();
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>