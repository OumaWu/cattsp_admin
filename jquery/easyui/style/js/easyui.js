// JavaScript Document

// 增加 tab 不刷新
function addTab(title,url){
	if ($('#centerTab').tabs('exists', title)){
			$('#centerTab').tabs('select', title);
		} else {
			var content = '<iframe id="'+title+'" frameborder="0" src="'+url+'" style="width:100%;" onload="SetCwinHeight(this)"></iframe>';
			$('#centerTab').tabs('add',{
			title:title,
			content:content,
			closable:true
		});
	}
}

// 增加 tab 刷新
function addTabRl(title,url){
	if ($('#centerTab').tabs('exists', title)){
			document.frames(title).location.href = url;
			$('#centerTab').tabs('select', title);
		} else {
			var content = '<iframe id="'+title+'" name="'+title+'" frameborder="0" src="'+url+'" style="width:100%;" onload="SetCwinHeight(this)"></iframe>';
			$('#centerTab').tabs('add',{
			title:title,
			content:content,
			closable:true
		});
	}
}

// 弹出窗口
var frmobj;
function dlg(title,url,iframobj){
	frmobj = iframobj;
	$(document).find("#dlgfrm").attr("src",url);
	$("#dlg").dialog("open").dialog('setTitle',title);
}
function dlgReUrl(url){
	var obj = frmobj;
	if(url==null)
		obj.src=obj.src;
	else
		obj.src = url;
}
function dlgClose(){
	$("#dlg").dialog("close");
}


// 设置高度
function SetH(id,h){
	$(id).css('height',h);
}

// iframe 自适应高度
function SetCwinHeight(obj) {
	var cwin = obj;
	if (document.getElementById) {
		if (cwin && !window.opera) {
		if (cwin.contentDocument && cwin.contentDocument.body.offsetHeight)
			cwin.height = cwin.contentDocument.body.offsetHeight + 20; //FF NS
			else if (cwin.Document && cwin.Document.body.scrollHeight)
			cwin.height = cwin.Document.body.scrollHeight + 10; //IE
			}
			else {
			if (cwin.contentWindow.document && cwin.contentWindow.document.body.scrollHeight)
			cwin.height = cwin.contentWindow.document.body.scrollHeight; //Opera
		}
	}
}

// 隔行，移入，点击变色
function GridList() {
	$(document).ready(function(){
	   var lastLineId = "";
		$(".grid tbody tr:odd").css("background","#f8f8f8");
		$(".grid tbody tr:odd").attr("bg","#f8f8f8");
		$(".grid tbody tr:even").attr("bg","#ffffff");
		$(".grid tbody tr").mouseover(function(){
			if(lastLineId != $(this).attr("id"))
				$(this).css("background","#eaf2ff");
		})   
		$(".grid tbody tr").mouseout(function(){
			if(lastLineId != $(this).attr("id")){
				var bgc = $(this).attr("bg");
				$(this).css("background",bgc);
			}
		})
	   $(".grid tbody tr").click(function() {
			if (lastLineId != "") {
				var bgc = $("#"+lastLineId).attr("bg");
				$("#"+lastLineId).css("background",bgc);
			}
			$(this).css("background","#fff0be");
			lastLineId = $(this).attr("id");
	   })
	})	
}
