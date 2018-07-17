<?
	$filename = $_SERVER['DOCUMENT_ROOT'].$_GET["filename"];
	$filenameold = rawurlencode($_GET["filenameold"]);

	header("Content-Language:utf-8");
	//header("Content-type:application/octet-stream");
	header("Accept-Ranges:bytes");
	header("Content-Type:application/force-download");
	header("Content-Disposition:attachment;filename=".$filenameold);
	header("Accept-Length:".filesize($filename));
	readfile($filename);	
?>