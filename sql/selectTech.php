<?php
include("connection.php");
$url = "../tech_list.php";
$id = $_GET["id"];
if (!empty($id)) {
    $sql = "SELECT * FROM `solar_technologies` where id = $id";
    try {
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
        } else {
            echo "<script> alert('提取太阳能技术内容失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('查找的技术成果不存在！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
}
?>