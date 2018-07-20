<?
    session_start();

	if(empty($_SESSION["username"]) || empty($_SESSION["id"]) || $_SESSION['expire_time'] < time()) {
		header("location:login.php");
	} else {
        $_SESSION['expire_time'] = time() + 1200; // 刷新时间戳，20分钟
    }

?>