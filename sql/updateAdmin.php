<?php
$id = $_POST["id"];
$url = "../user_list.php#admins";
$url2 = "../admin_edit.php?id={$id}";

$username = $_POST["username"];
$level = $_POST["level"];
$password = $_POST["password"];
$old_password = $_POST["old_password"];

if (!empty($username) && !empty($level)) {

    //如果输入了新密码，则加密；否则将原有密码赋给新密码变量
    if (empty($password)) {
        $password = $old_password;
    }
    else {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    include("connection.php");



    $sql = "UPDATE `admin`"
        ." SET `username` = '{$username}', `password` = '{$password}', `level` = '{$level}'"
        ." WHERE `admin`.`id` = $id";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('更新管理员资料成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('更新管理员资料失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('请填必填信息！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url2\">";
}
?>