<?
	include("../../app_php/conn.php");
	include("../user.php");

	$filelist = ReStrG("filelist");
	$dir_root = $_SERVER['DOCUMENT_ROOT'];
	
	// 删除
	if (isset($_GET['del']))
	{
		$del = ReNumG("del");
		
		// 删除文件
		$sql = "select filename from d_upload where id=$del";
		$file = $dir_root.GetFirst($sql);
		if(file_exists($file))
			unlink($file);

		// 删除记录
		$sql = "delete from d_upload where id=$del";
		RunSql($sql);
		
		// 文件列表
		$filelist = str_replace($del.",","",$filelist);
	}

	// 上传
	if (isset($_POST['submit']))
	{
		if($_FILES['userfile']['name'])
		{
			$mess = "";
			$filetype = $_FILES['userfile']['type'];
			$filesize = $_FILES['userfile']['size'];
			$filenameold = $_FILES['userfile']['name'];
			$fileext = ".".pathinfo($filenameold,PATHINFO_EXTENSION); 
			
			if($fileext!=".doc" && $fileext!=".rar" && $fileext!=".jpg" ) 
				$mess = "错误：只能上传 .doc .rar .jpg 类型的文件！";
			
			if($filesize>2*1024*1024)
				$mess = "错误：文件大小不能超过2M！";
			
			if ($mess=="")
			{
				// 创建目录
				$dir = "/upload/file/".date('Y')."/".date('m')."/";
				cc::MakeDir($dir_root.$dir);

				$filename = $dir.date("YmdHis").rand(100,999).$fileext;
				$fileto = $dir_root.$filename;
			
				// 保存文件
				if(move_uploaded_file($_FILES['userfile']['tmp_name'],$fileto))
				{
					// 写入数据库
					$id = GetNewId("d_upload");
					$content = ReStr("content");
					$sql = "insert into d_upload (id,type,filename,filenameold,filesize,content,createtime) 
					values ($id,'file','$filename','$filenameold','$filesize','$content',now())";
					RunSql($sql);
	
					// 生成列表
					$filelist = ReStr("filelist").$id.",";
				}
				else
					cc::MsgBoxRe("上传错误！");
			}
			else
				echo $mess;
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../style/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
<?
	// 显示附件
	if($filelist!="")
	{
		$sql = "select * from d_upload where id in (".substr($filelist,0,-1).")";
		$rs = GetRs($sql);
		$N=1;
		while($row=GetRow($rs))
		{
?>	
    <tr>
      <td height="25"><a href="down.php?filenameold=<?=urlencode($row["filenameold"])?>&filename=<?=$row["filename"]?>">附件<?=$N++?>：<?=$row["filenameold"]?></a> 
      <?=$row["content"]?>[<a href="upload_file.php?del=<?=$row["id"]?>&filelist=<?=$filelist?>" onClick="if(!confirm('确认删除?')) return false;">删除</a>]</td>
    </tr>
<? }}?>
    <tr>
      <td> 上传附件：
        <input name="userfile" type="file" class="p12" size="38" /></td>
    </tr>
    <tr>
      <td>附件说明：
        <input name="content" type="text" id="content" size="38">
        <input name="submit" type="submit" class="p12" value="上传" />
        <input name="filelist" type="hidden" id="filelist" value="<?=$filelist?>"></td>
    </tr>
  </form>
</table>
<script>
	parent.document.getElementById("filelist").value = document.getElementById('filelist').value;
	parent.document.getElementById("uplodfrm").height = document.body.scrollHeight+10;
</script>
</body>
</html>
