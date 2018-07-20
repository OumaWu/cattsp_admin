<?php
include("connection.php");
$url = $_SERVER["HTTP_REFERER"];
$id = $_GET["id"];
if (!empty($id)) {
    $sql = "SELECT * FROM `demands` where id = $id";
    try {
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
        } else {
            echo "<script> alert('提取需求内容失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('没有接收到需求id');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
}

?>