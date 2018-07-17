<?
	include("../../app_php/conn.php");
	include("../user.php");

	$piclist = ReStrG("piclist");
	$dir_root = $_SERVER['DOCUMENT_ROOT'];
	
	// 删除
	if (isset($_GET['del']))
	{
		$del = ReNumG("del");
		
		// 删除文件
		$sql = "select pic,pics from d_upload where id=$del";
		$rowDel = GetRsRow($sql);
		$pic = $dir_root.$rowDel["pic"];
		$pics = $dir_root.$rowDel["pics"];
		if(file_exists($pic))
			unlink($pic);
		if(file_exists($pics))
			unlink($pics);

		// 删除记录
		$sql = "delete from d_upload where id=$del";
		RunSql($sql);
		
		// 图片列表
		$piclist = str_replace($del.",","",$piclist);
	}

	// 上传
	if (isset($_POST['submit']))
	{
		if($_FILES['userfile']['name'])
		{
			$filetype = $_FILES['userfile']['type'];
			$filesize = $_FILES['userfile']['size'];
			$filename = $_FILES['userfile']['name'];
			$fileext = ".".pathinfo($filename,PATHINFO_EXTENSION); 
			
			//if($filetype!="image/pjpeg" && $filetype!="image/jpeg") 
				//$mess = "错误：只能上传.jpg类型的文件！";
				
			// 文件类别
			$mess = "";
			if($fileext!=".jpg" && $fileext!=".gif" && $fileext!=".png") 
				$mess = "错误：只能上传 .jpg .gif .png 类型的文件！";
			if($filesize>2*1024*1024)
				$mess = "错误：文件大小不能超过2M！";		
			if ($mess=="")
			{
				// 创建目录
				$dir = "/upload/article/".date('Y')."/".date('m')."/";
				if(!MakeDir($dir_root.$dir))
				{
					echo "创建目录错误！";
					exit;
				}
								
				// 文件名
				$filename = date("YmdHis").rand(100,999);
				$pic = $dir.$filename.$fileext;
				$picto = $dir_root.$pic;
				$pics = $dir.$filename."s".$fileext;
				$picsto = $dir_root.$pics;
				
				// 保存文件
				if(move_uploaded_file($_FILES['userfile']['tmp_name'],$picto))
				{
					if(file_exists($picto))
						$image_size = getimagesize($picto);
					if($image_size[0]>500)
						makethumb($picto,$picto,"500"); // 大图转小
					makethumb($picto,$picsto,"200"); // 缩略图
				}
				else
				{
					echo "上传错误";exit;
				}

				// 写入数据库
				$id = GetNewId("d_upload");
				$content = ReStr("content");
				$sql = "insert into d_upload (id,type,pic,pics,filesize,content,createtime) 
				values ($id,'article','$pic','$pics','$filesize','$content',now())";
				RunSql($sql);

				// 生成图片列表
				$piclist = ReStr("piclist").$id.",";		
			}
			else
				echo $mess;
		}
	}

	// 创建目录
	function MakeDir( $dir, $mode = "0777" ) {    
	if( ! $dir ) return 0;    
	$dir = str_replace( "", "/", $dir );
	   
	$mdir = "";   
	foreach( explode( "/", $dir ) as $val ) {   
	  $mdir .= $val."/";   
	  if( $val == ".." || $val == "." || trim( $val ) == "" ) continue;    
		  
	  if( ! file_exists( $mdir ) ) {    
		if(!@mkdir( $mdir, $mode )){    
		 return false;    
		}    
	  }    
	}    
	return true;    
	}    		
	
	/*构造函数-生成缩略图+水印,参数说明:
	$srcFile-图片文件名,
	$dstFile-另存文件名,
	$markwords-水印文字,
	$markimage-水印图片,
	$dstW-图片保存宽度,
	$dstH-图片保存高度,
	$rate-图片保存品质*/ 
	function makethumb($srcFile,$dstFile,$dstW,$dstH2=0,$rate=100,$markwords=null,$markimage=null) 
	{ 
		$data = GetImageSize($srcFile); 
		switch($data[2]) 
		{ 
			case 1: 
				$im=@ImageCreateFromGIF($srcFile); 
				break; 
			case 2: 
				$im=@ImageCreateFromJPEG($srcFile); 
				break; 
			case 3: 
				$im=@ImageCreateFromPNG($srcFile); 
				break; 
		} 
		if(!$im) return False; 
		$srcW=ImageSX($im); 
		$srcH=ImageSY($im); 
		$dstX=0; 
		$dstY=0; 
		$dstH = $dstW*$srcH/$srcW; // 按比例计算高度
		if ($srcW*$dstH>$srcH*$dstW) 
		{ 
			$fdstH = round($srcH*$dstW/$srcW); 
			$dstY = floor(($dstH-$fdstH)/2); 
			$fdstW = $dstW; 
		} 
		else 
		{ 
			$fdstW = round($srcW*$dstH/$srcH); 
			$dstX = floor(($dstW-$fdstW)/2); 
			$fdstH = $dstH; 
		} 
		$ni=ImageCreateTrueColor($dstW,$dstH); 
		$dstX=($dstX<0)?0:$dstX; 
		$dstY=($dstX<0)?0:$dstY; 
		$dstX=($dstX>($dstW/2))?floor($dstW/2):$dstX; 
		$dstY=($dstY>($dstH/2))?floor($dstH/s):$dstY; 
		$white = ImageColorAllocate($ni,255,255,255); 
		$black = ImageColorAllocate($ni,0,0,0); 
		imagefilledrectangle($ni,0,0,$dstW,$dstH,$white);// 填充背景色 
		ImageCopyResized($ni,$im,$dstX,$dstY,0,0,$fdstW,$fdstH,$srcW,$srcH); 
		if($markwords!=null) 
		{ 
			$markwords=iconv("gb2312","UTF-8",$markwords); 
			//转换文字编码 
			ImageTTFText($ni,20,30,450,560,$black,"simhei.ttf",$markwords); //写入文字水印 
			//参数依次为，文字大小|偏转度|横坐标|纵坐标|文字颜色|文字类型|文字内容 
		} 
		elseif($markimage!=null) 
		{ 
			$wimage_data = GetImageSize($markimage); 
			switch($wimage_data[2]) 
			{ 
			case 1: 
			$wimage=@ImageCreateFromGIF($markimage); 
			break; 
			case 2: 
			$wimage=@ImageCreateFromJPEG($markimage); 
			break; 
			case 3: 
			$wimage=@ImageCreateFromPNG($markimage); 
			break; 
			} 
			imagecopy($ni,$wimage,500,560,0,0,88,31); //写入图片水印,水印图片大小默认为88*31 
			imagedestroy($wimage); 
		} 
		ImageJpeg($ni,$dstFile,$rate); 
		//ImageJpeg($ni,$srcFile,$rate); 
		imagedestroy($im); 
		imagedestroy($ni); 
	} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图片上传</title>
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
  <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="upload_pics.php">
<?
	// 显示图片
	if($piclist!="")
	{
		$sql = "select * from d_upload where id in (".substr($piclist,0,-1).")";
		$rs = GetRs($sql);
		while($row=GetRow($rs))
		{
?>	
    <tr>
      <td><img src="<?=$row["pic"]?>" width="120"  height="90"><?=$row["content"]?>[<a href="upload_pics.php?del=<?=$row["id"]?>&piclist=<?=$piclist?>"onClick="if(!confirm('确认删除?')) return false;">删除</a>]<br><br></td>
    </tr>
<? }}?>
    <tr>
      <td> 上传图片：
        <input name="userfile" type="file" class="p12" size="38" /></td>
    </tr>
    <tr>
      <td>图片说明：
        <input name="content" type="text" id="content" size="38">
        <input name="submit" type="submit" class="p12" value="上传"/>
        <input name="piclist" type="hidden" id="piclist" value="<?=$piclist?>"></td>
    </tr>
  </form>
</table>
<script>
	parent.document.getElementById("piclist").value = document.getElementById('piclist').value;
	parent.document.getElementById("uplodfrm").height = document.body.scrollHeight+10;
</script>
</body>
</html>
