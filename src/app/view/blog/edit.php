<div class="uk-margin-large-left">
    <div class="uk-container">
        <?php if (isset($blog)): ?>
        <form class="uk-width-2-3" action="/blog/update" method="POST">
            <input id="id" name="id" value="<?php echo $blog["id"]; ?>" hidden>
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">編集 | EDIT</legend>
        <?php else: ?>
        <form class="uk-width-2-3" action="/blog/add" method="POST">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">追加 | ADD</legend>
        <?php endif; ?>
                <div class="uk-margin">
                    <input class="uk-input" name="title" type="text" placeholder="題名 | Title"
                           value="<?php echo isset($blog) ? $blog["title"] : ""; ?>">
                </div>
                <div class="uk-margin">
                <textarea class="uk-textarea" name="summary" rows="5"
                          placeholder="摘要 | Summary"><?php echo isset($blog) ? $blog["summary"] : ""; ?></textarea>
                </div>
                <div class="uk-margin">
                <textarea class="uk-textarea" name="content" rows="5"
                          placeholder="内容 | Content"><?php echo isset($blog) ? $blog["content"] : ""; ?></textarea>
                </div>
                <div class="uk-margin" style="max-width:250px;">
                    <button class="uk-button uk-button-secondary uk-width-1-1">提出</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>