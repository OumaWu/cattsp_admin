<?php
include("connection.php");

$url = $_SERVER["HTTP_REFERER"];
$q_id = $_GET["q_id"];

if (!empty($q_id)) {
    try {
        $sql = "DELETE FROM `question` WHERE `id` = {$q_id}";

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
    echo "<script> alert('要删除的问题不存在！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}

?>