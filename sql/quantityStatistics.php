<?php
/**
 * Created by PhpStorm.
 * User: Wjh
 * Date: 2018/8/3
 * Time: 10:09
 */
$url = $_SERVER["HTTP_REFERER"];
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

    $sql = "SELECT `location`, COUNT(`location`) AS `count`"
        ." FROM `{$table}`"
        ." GROUP BY `location`";

    $sql2 = "SELECT `date`, COUNT(`date`) AS `count`"
        ." FROM `{$table}`"
        ." GROUP BY `date`"
        ." ORDER BY `date` ASC";

    try {
        $result = $pdo->prepare($sql);
        $result2 = $pdo->prepare($sql2);

        if ($result->execute() && $result2->execute()) {

        } else {
            echo "<script> alert('提取统计数据失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
            exit();
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('没有接收到数据！！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}
?>





