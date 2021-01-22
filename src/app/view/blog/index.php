<div class="uk-container">
    <div class="uk-margin-medium" uk-grid>
        <div class="uk-width-1-1 uk-width-2-3@s">
            <ul class="uk-list uk-list-divider uk-list-large">
                <?php if (isset($pageResult)):foreach ($pageResult->getListData() as $blog): ?>
                    <li>
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
                                    <a class="uk-button uk-button-text" href="#">阅读更多</a>
                                </div>
                                <div>
                                    <a class="uk-button uk-button-text" href="#">5 条评论</a>
                                </div>
                            </div>
                        </article>
                    </li>
                <?php endforeach ?>
                <?php endif ?>
            </ul>

            <div class="uk-margin-large">
                <ul class="uk-pagination uk-flex-center" uk-margin>
                    <li><a href="#"><span uk-pagination-previous></span></a></li>
                    <?php if (isset($pageResult)): for ($i = 1; $i <= $pageResult->getTotalPage(); $i++): ?>
                        <li><a href="#"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                    <?php endif ?>
                    <li><a href="#"><span uk-pagination-next></span></a></li>
                </ul>
            </div>
        </div>
        <div class="uk-width-1-1 uk-width-1-3@s">
            <div class="uk-card uk-card-body">
                <h4>站内搜索</h4>
                <form action="blog" method="POST">
                    <div class="uk-inline">
                        <input class="uk-input" type="text" name="keyword" placeholder="検索" size="31" maxlength="255">
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="uk-button uk-button-default">検索</button>
                </form>
            </div>
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title">归档</h3>
                <ul class="uk-list uk-list-divider">
                    <li><a href="">2019年12月</a></li>
                    <li><a href="">2019年11月</a></li>
                    <li><a href="">2019年10月</a></li>
                    <li><a href="">2019年9月</a></li>
                    <li><a href="">2019年8月</a></li>
                    <li><a href="">2019年7月</a></li>
                    <li><a href="">2019年6月</a></li>
                </ul>
            </div>
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title">社交平台</h3>
                <ul class="uk-list">
                    <li><a href="">微博</a></li>
                    <li><a href="">微信</a></li>
                    <li><a href="">推特</a></li>
                    <li><a href="">facebook</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
