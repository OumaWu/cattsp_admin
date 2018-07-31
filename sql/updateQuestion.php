<?php

$url = "../question_list.php";
$url2 = $_SERVER["HTTP_REFERER"];

if (!empty($_POST["q_id"]) && !empty($_POST["title"])
    && !empty($_POST["content"])) {

    include("connection.php");
    $q_id = $_POST["q_id"];
    $title = $_POST["title"];
    $content = $_POST["content"];


    $sql = "UPDATE `question`"
        ." SET `title` = '{$title}', `content` = '{$content}'"
        ." WHERE `id` = {$q_id}";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('更新问题成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('更新问题失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('问题名称和描述不能为空！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
}
?>