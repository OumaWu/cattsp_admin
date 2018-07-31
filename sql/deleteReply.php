<?php
include("connection.php");

$url = $_SERVER["HTTP_REFERER"];
$id = $_GET["id"];

if (!empty($id)) {
    try {
        $sql = "DELETE FROM `reply` WHERE `id` = {$id}";

        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('删除成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('删除失败！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        }

    } catch (PDOException $e) {
        die("Error!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('要删除的回复不存在！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}

?>