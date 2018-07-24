<?php
$url = "../user_list.php#admins";
$url2 = $_SERVER["HTTP_REFERER"];
$username = $_POST["username"];
$password = $_POST["password"];
$level = $_POST["level"];

if (!empty($username) && !empty($password) && !empty($level)){

    include("connection.php");

    //加密密码
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `admin` (`id`, `username`, `password`, `level`) "
        . "VALUES (NULL, '{$username}', '{$password}', '{$level}')";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('添加管理员账号成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url}\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('添加管理员账号失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url2}\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('请填必填信息！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url={$url2}\">";
}
?>