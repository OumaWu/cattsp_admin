<?php
include("connection.php");
$url = "../info_category.php";

if (!empty($_POST["action"])) {
//    $category = $_POST["category"];
    $action = $_POST["action"];

    switch ($action) {
        case "insert" :
            if (empty($_POST["form_data"])) {
//                echo "<script> alert('没有接收到数据！！');</script>";
//                echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
                echo -1;
            } else {
                // 获取到的数据格式为 “foo=bar&baz=boom&cow=milk&php=hypertext+processor”
                // http_build_query 的数据形式用parse_str解析为数组格式
                parse_str($_POST["form_data"],$form_data);
                $category = $form_data["category"];

                $sql = "INSERT INTO `policy_category` (`id`, `title`) "
                    ."VALUES (NULL, '{$category}')";

            }
            break;
        case "update" :
            if (empty($_POST["form_data"])) {
//                echo "<script> alert('没有接收到id！！');</script>";
//                echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
                echo -1;
            } else {
                parse_str($_POST["form_data"],$form_data);
                $id = $form_data["category_id"];
                $category = $form_data["category"];
                $sql = "UPDATE `policy_category` "
                    ."SET `title` = '{$category}' "
                    ."WHERE `policy_category`.`id` = {$id}";
            }
            break;
        case "delete" :
            if (empty($_POST["id"])) {
//                echo "<script> alert('没有接收到id！！');</script>";
//                echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
                echo -1;
            } else {
                $id = $_POST["id"];
                $sql = "DELETE FROM `policy_category` WHERE `id` = '{$id}'";
            }
    }

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
//            echo "<script> alert('成功！！');</script>";
//            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
            echo 1;
        } else {
            $pdo->rollBack();
//            echo "<script> alert('失败！！\n' + $pdo->errorInfo());</script>";
//            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
            echo 0;
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
   echo -1;
}
?>