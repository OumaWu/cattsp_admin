<?php
include("connection.php");
$url = "../info_category.php";

//$form_data = $_POST['form_data'];
//$param_arr = array();
//
//// 获取到的数据格式为 “foo=bar&baz=boom&cow=milk&php=hypertext+processor”
//// http_build_query 的数据形式用parse_str解析为数组格式
//parse_str($form_data, $param_arr);

if (!empty($_POST["category"])) {
    $category = $_POST["category"];

    $sql = "INSERT INTO `news_category` (`id`, `title`) "
    ."VALUES (NULL, '{$category}')";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('添加栏目成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('添加栏目失败！！\n' + $pdo->errorInfo());</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        }
    } catch (PDOException $e) {
        die("错误!!: " . $e->getMessage() . "<br>");
    }
} else {
    echo "<script> alert('请填栏目名称！！');</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
}
?>