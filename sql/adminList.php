<?php
include("connection.php");

$sql = "SELECT * FROM `admin`";
try {
    $result = $pdo->prepare($sql);
    if ($result->execute()) {
     } else {
        echo "<script> alert('提取账号列表失败！！\\n{$pdo->errorInfo()}');</script>";
        echo $pdo->errorInfo();
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}

?>