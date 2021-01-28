<main>
    <div class="bedit-container">
        <?php if (isset($blog)): ?>
        <form action="/blog/update" method="POST">
            <input id="id" name="id" value="<?php echo $blog["id"]; ?>" hidden>
            <h2>編集 | EDIT</h2>
            <?php else: ?>
            <form action="/blog/add" method="POST">
                <h2>追加 | ADD</h2>
                <?php endif; ?>
                <div>
                    <label>
                        <input name="title" type="text" placeholder="題名 | Title"
                               value="<?php echo isset($blog) ? $blog["title"] : ""; ?>">
                    </label>
                </div>
                <div>
                    <label>
                        <textarea name="summary" rows="5"
                                  placeholder="摘要 | Summary"><?php echo isset($blog) ? $blog["summary"] : ""; ?></textarea>
                    </label>
                </div>
                <div>
                    <label>
                        <textarea class="bedit-content" name="content" rows="5"
                                  placeholder="内容 | Content"><?php echo isset($blog) ? $blog["content"] : ""; ?></textarea>
                    </label>
                </div>
                <div class="uk-margin" style="max-width:250px;">
                    <button class="uk-button uk-button-secondary uk-width-1-1">提出</button>
                </div>
            </form>
    </div>
</main>