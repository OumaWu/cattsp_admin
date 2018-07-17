<script charset="utf-8" src="./editor/kindeditor.js"></script>
<script charset="utf-8" src="./editor/lang/zh_CN.js"></script>
<script>
    var editor;
    KindEditor.ready(function (K) {
        editor = K.create('#editor_id');
    });
</script>
<textarea id="editor_id" name="content" style="width:900px;height:500px;" cols="45" rows="5">
    <?php
    if ($news->content) {
        $content = preg_split("/[\s]+/", $news->content);
        foreach ($content as $paragraph) { ?>
            <p style="text-align:justify">&emsp;&emsp;<?= $paragraph; ?></p>
        <?php }
    }
    ?>
</textarea>