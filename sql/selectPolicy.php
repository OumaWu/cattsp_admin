<?php


include("connection.php");

$url = $_SERVER["HTTP_REFERER"];

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT policy.id, policy.title, policy.content, policy.date, policy_category.title category "
        . "FROM `policy`, `policy_category` "
        . "WHERE `policy`.`id` = {$id} AND policy.category = policy_category.id";


    try {
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
        } else {
            echo "<script> alert('提取政策数据失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('政策不存在！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}

?>