<?php
$url = $_SERVER["HTTP_REFERER"];

$id = $_POST["id"];
$password = $_POST["password"];

if (!empty($password) && !empty($id)) {

    $password = password_hash($password, PASSWORD_DEFAULT);

    include("connection.php");

    $sql = "UPDATE `admin`"
        ." SET `password` = '{$password}'"
        ." WHERE `admin`.`id` = $id";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('更新密码成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('更新密码失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('密码不能为空！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}
?>