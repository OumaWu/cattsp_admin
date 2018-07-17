// 提交表单
function delete_info(id)
{
    if(!id)
    {
        alert('Error！');
        return false;
    }
    // var form_data = new Array();

    $.ajax(
        {
            url: "action/user_action.php",
            data:{"id":id, "act":"del"},
            type: "post",
            beforeSend:function()
            {
                $("#tip").html("<span style='color:blue'>正在处理...</span>");
                return true;
            },
            success:function(data)
            {
                if(data > 0)
                {
                    alert('操作成功');
                    $("#tip").html("<span style='color:blueviolet'>恭喜，删除成功！</span>");

                    // document.location.href='world_system_notice.php'
                    location.reload();
                }
                else
                {
                    $("#tip").html("<span style='color:red'>失败，请重试</span>");
                    alert('操作失败');
                }
            },
            error:function()
            {
                alert('请求出错');
            },
            complete:function()
            {
                // $('#tips').hide();
            }
        });

    return false;
}

// 编辑表单
function get_edit_info(id)
{
    if(!id)
    {
        alert('Error！');
        return false;
    }
    // var form_data = new Array();

    $.ajax(
        {
            url: "./sql/newsColumn.php",
            data:{"id":id, "act":"get"},
            type: "post",
            beforeSend:function()
            {
                // $("#tip").html("<span style='color:blue'>正在处理...</span>");
                return true;
            },
            success:function(data)
            {
                if(data)
                {
                    // 解析json数据

                    var data_obj = eval("("+data+")");

                    // 赋值
                    $("#category").val(data_obj.category);

                    $("#remark").val(data_obj.remark);
                    $("#act").val("edit");

                    // 将input元素设置为readonly
                    $('#category').attr("readonly","readonly")
                    // location.reload();
                }
                else
                {
                    $("#tip").html("<span style='color:red'>失败，请重试</span>");
                    //  alert('操作失败');
                }
            },
            error:function()
            {
                alert('请求出错');
            },
            complete:function()
            {
                // $('#tips').hide();
            }
        });

    return false;
}

// 提交表单
function check_form()
{
    var category = $.trim($('#category').val());
    var act     = $.trim($('#act').val());

    if(!category)
    {
        alert('栏目名称不能为空！');
        return false;
    }
    var form_data = $('#form_data').serialize();

    // 异步提交数据到action/add_action.php页面
    $.ajax(
        {
            url: "./sql.insertNewsCategory.php",
            data:{"form_data":form_data,"act":act},
            type: "post",
        });

    return false;
}

$(function () { $('#myModal').on('hide.bs.modal', function () {
    // 关闭时清空edit状态为add
    $("#act").val("add");
    location.reload();
})
});