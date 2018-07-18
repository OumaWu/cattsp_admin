<?php
	include("connection.php");
	if (isset($_GET["id"]))
	{	
		$id = $_GET["id"];
		
		$sql = "SELECT policy.id, policy.title, policy.content, policy.date, policy_category.title category "
            . "FROM `policy`, `policy_category` "
            . "WHERE `policy`.`id` = {$id} AND policy.category = policy_category.id";


		try{
			$result = $pdo->prepare($sql);
			if($result->execute()){
//				echo "<script> alert('提取政策数据成功！！');</script>";
			}
			else{
				echo "<script> alert('提取政策数据失败！！');</script>";
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