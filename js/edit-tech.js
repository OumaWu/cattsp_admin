// 获取图片上传对象
let img1 = document.getElementById("img1");
let img2 = document.getElementById("img2");
let img3 = document.getElementById("img3");
let img4 = document.getElementById("img4");
let img5 = document.getElementById("img5");

// 获取图片对象
let pre1 = document.getElementById("preview1");
let pre2 = document.getElementById("preview2");
let pre3 = document.getElementById("preview3");
let pre4 = document.getElementById("preview4");
let pre5 = document.getElementById("preview5");

// 绑定预览上传事件和预览功能
img1.onchange = function(){

    // 获取input上传的图片数据，得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;
    pre1.src = window.URL.createObjectURL(this.files[0]) ;
}

img2.onchange = function(){

    // 获取input上传的图片数据，得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;
    pre2.src = window.URL.createObjectURL(this.files[0]) ;
}

img3.onchange = function(){

    // 获取input上传的图片数据，得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;
    pre3.src = window.URL.createObjectURL(this.files[0]) ;
}

img4.onchange = function(){

    // 获取input上传的图片数据，得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;
    pre4.src = window.URL.createObjectURL(this.files[0]) ;
}

img5.onchange = function(){

    // 获取input上传的图片数据，得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;
    pre5.src = window.URL.createObjectURL(this.files[0]) ;
}

//设置回车提交数据
$("#form1").bind("keydown",function(e){

    // 兼容FF和IE和Opera

    var theEvent = e || window.event;

    var code = theEvent.keyCode || theEvent.which || theEvent.charCode;

    if (code == 13) {

        //回车执行查询
        $("#button").click();
    }

});

//将隐藏的post用户名的值与选中的option的值绑定
function setUsername () {
    var userName = $("#user_id").find("option:selected").text();
    $("#user_name").val(userName);
}