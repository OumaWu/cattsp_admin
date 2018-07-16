<?
    session_start();

	if(empty($_SESSION["username"]) || empty($_SESSION["id"])) {
		header("location:login.php");
	} else {
        $user_id = $_SESSION["id"];
        $user_name = $_SESSION["username"];
    }

?>