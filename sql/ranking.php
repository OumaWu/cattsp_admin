<?php
/**
 * Created by PhpStorm.
 * User: wlssvr01
 * Date: 2018/8/3
 * Time: 10:09
 */
$start = $_POST["start"];
$end = $_POST["end"];
$dateStmt = "";

if (!empty($start) && !empty($end) && $start <= $end) {
    $dateStmt .= " and `v_date` BETWEEN '{$start}' AND '{$end}'";
}

include ("connection.php");

$sql = "select `s`.`id` AS `s_id`,`s`.`title` AS `title`,sum(`v`.`v_count`) AS `count`"
    ." from `visit_statistic` `v`, `solar_technologies` `s`"
    ." where (`v`.`t_id` = `s`.`id`)"
    . $dateStmt
    ." group by `v`.`t_id`"
    ." order by `count` desc"
    ." limit 10";

try {
    $result = $pdo->prepare($sql);

    if ($result->execute()) {

    } else {
        echo "<script> alert('提取排名数据失败！！\\n{$pdo->errorInfo()}');</script>";
//        echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        exit();
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}
?>





