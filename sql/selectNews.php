<?php
	include("connection.php");
	if (isset($_GET["id"]))
	{	
		$id = $_GET["id"];
		
		$sql = "SELECT news.id, news.title, news.content, news.date, news_category.title category "
            . "FROM `news`, `news_category` "
            . "WHERE `news`.`id` = {$id} AND news.category = news_category.id";


		try{
			$result = $pdo->prepare($sql);
			if($result->execute()){
//				echo "<script> alert('提取新闻数据成功！！');</script>";
			}
			else{
				echo "<script> alert('提取新闻数据失败！！');</script>";
				echo $pdo->errorInfo();
			}	
		} catch(PDOException $e) {
			die("错误!!: ".$e->getMessage()."<br>");
		}
	}
	else{
		echo "没有接收到类型！！！";	
	}

?>