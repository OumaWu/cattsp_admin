<?php

$url = "../policy_list.php";
$url2 = $_SERVER["HTTP_REFERER"];

if (!empty($_POST["id"]) && !empty($_POST["title"])
    && !empty($_POST["content"]) && !empty($_POST["category"])) {

    include("connection.php");
    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $category = $_POST["category"];


    $sql = "UPDATE `policy`"
        ." SET `title` = '{$title}', `content` = '{$content}', `category` = '{$category}'"
        ." WHERE `policy`.`id` = {$id}";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('更新政策成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('更新政策失败！！\\n'+'{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('请填必填信息！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
}
?>