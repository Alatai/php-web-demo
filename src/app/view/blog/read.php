<?php if (isset($blog)): ?>
    <div class="uk-container">
        <div class="uk-margin-medium" uk-grid>
            <div class="uk-width-4-5">
                <article class="uk-article">
                    <h1 class="uk-article-title">
                        <a class="uk-link-reset" href=""><?php echo $blog["title"]; ?></a>
                    </h1>
                    <p class="uk-article-meta">Written by
                        <a href="#"><?php echo $blog["writer"]; ?></a>
                        <?php echo $blog["created_at"]; ?>
                    </p>
                    <p class="uk-text-lead"><?php echo $blog["summary"]; ?></p>
                    <p><?php echo $blog["content"]; ?></p>
                    <div class="uk-grid-small uk-child-width-auto" uk-grid>
                        <div>
                            <a class="uk-button uk-button-text"
                               href="/blog/edit?id=<?php echo $blog["id"]; ?>">EDIT</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
<?php endif ?>