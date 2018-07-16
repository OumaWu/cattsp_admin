<?php
require_once('connection.php');

if (isset($_GET['login'])) {

    $login = $_GET['login'];
    $sql = "SELECT * FROM `admin` where `name` = '{$login}'";

    try {
        $result = $pdo->prepare($sql);
        $result->execute();
        $rows = $result->rowCount();
        if ($rows == 0) {
            echo "1";
        }
        else {
            echo "0";
        }

    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else echo "没有接收到用户名！！！";

?>