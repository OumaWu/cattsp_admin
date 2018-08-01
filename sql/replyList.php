<?php

require_once ("./Page.class.php");

$p = empty($_GET["p"]) ? 1 : $_GET["p"];
$page = new Page("reply", "id", 10, $p);

include_once("connection.php");

$url = $_SERVER["HTTP_REFERER"];

if (isset($_GET['q_id'])) {
    $q_id = $_GET['q_id'];

    $sql = "select distinct r.id, r.content, u.accountname as u_account, u.realname as user, s.accountname as spe_account, s.name as expert, r.s_type, r.time"
        ." from reply r, users u, specialists s"
        ." where r.q_id = {$q_id}"
        ." and r.u_id = u.id and r.spe_id = s.id"
        ." order by r.time desc";

    try {
        $result = $pdo->prepare($page->getOffsetAdded($sql));
        if ($result->execute()) {
        } else {
            echo "<script> alert('提取回复列表失败！！\\n{$pdo->errorInfo()}');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }

} else {
    echo "<script> alert('搜索的回复问题不存在！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}
?>