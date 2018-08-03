<?php
/**
 * Created by PhpStorm.
 * User: wlssvr01
 * Date: 2018/8/3
 * Time: 10:09
 */
$s_type = $_GET["s_type"];

//从获取的统计类型来决定从哪个表提取数据
if(!empty($s_type)) {
    if ($s_type == "tech") {
        $table = "solar_technologies";
    }
    else if ($s_type == "demand") {
        $table = "demands";
    }
    else {
        echo "<script> alert('没有传入正确的统计类型！！');</script>";
        exit();
    }

    include "connection.php";

    $sql = "SELECT `location`, COUNT(`location`) AS `count` "
        ."FROM `{$table}` "
        ."GROUP BY `location`";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
        } else {
            echo "<script> alert('提取统计数据失败！！\\n{$pdo->errorInfo()}');</script>";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('没有接收到数据！！！');</script>";
}





