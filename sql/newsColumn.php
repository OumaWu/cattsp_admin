<?php
include_once('connection.php');
$url = "../info_category.php";

if (!empty($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "SELECT * FROM `news_category` WHERE `id` = '{$id}'";
    try {
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $res = $result->fetch(PDO::FETCH_ASSOC);
            echo json_encode($res);
        } else {
            echo "<script> alert('提取新闻栏目失败！！');</script>";
            echo $pdo->errorInfo();
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('没有接收到id！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}

?>