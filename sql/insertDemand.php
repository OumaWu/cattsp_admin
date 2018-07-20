<?php
include("connection.php");
$url = "../demand_list.php";
$url2 = $_SERVER["HTTP_REFERER"];

if (!empty($_POST["title"]) && !empty($_POST["description"] && !empty($_POST["email"]))
    && !empty($_POST["location"]) && !empty($_POST["entreprise"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $entreprise = $_POST["entreprise"];
    $userid = $_POST["user_id"];

    $sql = "INSERT INTO `demands` (`id`, `title`, `entreprise`, `location`, `email`, `description`, `date`, `userid`) "
        ."VALUES (NULL, '$title', '$entreprise', '$location', '$email', '$description', now(), '$userid')";

    try {
        $pdo->beginTransaction();
        $result = $pdo->prepare($sql);
        if ($result->execute()) {
            $pdo->commit();
            echo "<script> alert('发布需求成功！！');</script>";
            echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">";
        } else {
            $pdo->rollBack();
            echo "<script> alert('发布需求失败！！\\n{$pdo->errorInfo()}');</script>";
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