<script charset="utf-8" src="./editor/kindeditor.js"></script>
<script charset="utf-8" src="./editor/lang/zh_CN.js"></script>
<script>
    KindEditor.ready(function(K) {
        //textarea
        editor = K.create('#editor_id', {
            //themeType: 'simple',
            resizeType : 1,
            allowImageRemote : true,
            width : '100%',
            height : '500px',
            uploadJson: './editor/php/upload_json.php',
            fileManagerJson: './editor/php/file_manager_json.php',
            //items : ['source','bold','italic','underline','forecolor','image'],

            afterCreate: function(){this.sync();},  //此行可不写，不影响获取textarea的值
            afterBlur : function(){this.sync();}//需要添加的
        });

        //封面图实时上传
        K('#image').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    imageUrl : K('#url').val(),
                    clickFn : function(url, title, width, height, border, align) {
                        K('#url').val(url);
                        K("#image_show").html('![]('+url+')');
                        editor.hideDialog();
                    }
                });
            });
        });
    });
</script>
<textarea id="editor_id" name="content">
</textarea>