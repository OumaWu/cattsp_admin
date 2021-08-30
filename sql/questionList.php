<?php
/**
 * Created by PhpStorm.
 * User: Wjh
 * Date: 2018/7/31
 * Time: 7:54
 */

require_once ("./Page.class.php");

$p = empty($_GET["p"]) ? 1 : $_GET["p"];
$page = new Page("question_view", "q_id", 10, $p);

include_once("connection.php");

$url = $_SERVER["HTTP_REFERER"];

$sql = "SELECT `q_id`, `title`, `u_account`, `user`, `spe_account`, `expert`, `time` FROM `question_view`";

try {
    $result = $pdo->prepare($page->getOffsetAdded($sql));
    if ($result->execute()) {
    } else {
        echo "<script> alert('提取问题列表失败！！\\n{$pdo->errorInfo()}');</script>";
//        echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
    }
} catch (PDOException $e) {
    die("错误!!: " . $e->getMessage() . "<br>");
}
?>