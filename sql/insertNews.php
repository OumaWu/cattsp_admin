<?php
$url = "../info_list.php";
$url2 = $_SERVER["HTTP_REFERER"];
include("connection.php");
if (!empty($_POST["title"]) && !empty($_POST["content"]) && !empty($_POST["category"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
//		$image = $_POST["image"];
    $category = $_POST["category"];

    $sql = "INSERT INTO `news` (`id`, `title`, `content`, `date`, `category`) "
        . "VALUES (NULL, '{$title}', '{$content}', now(), '{$category}')";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('插入资讯成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('插入资讯失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
        }

    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");

    }
} else {
    echo "<script> alert('没有接收到数据！！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
}

?>