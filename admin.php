<?php
session_start();
if (empty($_SESSION["username"]) || empty($_SESSION["id"])
    || empty($_SESSION["level"]) || $_SESSION['expire_time'] < time()) { ?>
    <script>alert('登录超时，请重新登录');</script>
    <?php header("location:login.php");
} else {
    $_SESSION['expire_time'] = time() + 1200; // 刷新时间戳，20分钟
}
?>